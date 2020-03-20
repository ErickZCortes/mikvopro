<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use vendor\autoload;
use \RouterOS\Query;
use \RouterOS\Client;
use App\DetailVoucher;

class UserController extends Controller
{

//-----------------------------------------------------LOGIN---------------------------------------------
    
public function connect($ip,$user,$pass,$port){
    if($pass === null){
        $client = new Client([
            'host' => $ip,
            'user' => $user,
            'pass' => '',
            'port' => (int)$port,
        ]);
        return $client;
    }else{
        $client = new Client([
            'host' => $ip,
            'user' => $user,
            'pass' => $pass,
            'port' => (int)$port,
        ]);
        return $client;
    }
}
public static function formatBytes($size, $precision = 2)
{
    if ($size > 0) {
        $size = (int) $size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MiB', ' GB', ' TB');

        return round(pow(1024, $base - floor($base)), $precision);
    } else {
        return $size;
    }
}
    public function index(){
        if (session()->has('UserSession')) {
            if (session()->has('routerConnected')) {
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router; 
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $inforouter = session()->get('routerConnected');
                    $uidSesion = session()->get('UserSession')->id;
                    $user = User::find($uidSesion);
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $getactive =(new Query('/ip/hotspot/active/print'));
                    $active = $client->query($getactive)->read();
                    $getusers =(new Query('/ip/hotspot/user/print'));
                    $usersall = $client->query($getusers)->read();
                    $costos = DetailVoucher::sum('price_detailv');
                    
                    $getallresources = (new Query('/system/resource/print'));
                    $resources = $client->query($getallresources)->read();
                    $freememory = $resources[0]['free-memory'];
                    $totalmemory = $resources[0]['total-memory'];
                    $resta = ($totalmemory - $freememory);
                
                    $total = $this->formatBytes($totalmemory);
                    $free = $this->formatBytes($freememory);
                    $rest = $this->formatBytes($resta);
                
                    return view('mikvo.dashboard.layouts.main',["freememory"=>$free, "restmemeory"=>$rest,'costos'=>$costos,'usersall'=>$usersall, 'active'=>$active,'router'=>$inforouter, 'user' => $user ] );
                }
            }
        }
            return view('mikvo.login');    
    }
    public function login(){
        if($this->isSession()){
            return redirect(('/dashboard/routerboard'));
        }
        return view('welcome');
    }
    public function loginSession(Request $request){
        $password_user = $request->input('password_user');
        $usuario = User::where('email_user',$request->input('email_user'))->first();
        if(isset($usuario)){
            if(Hash::check($password_user,$usuario->password_user)){
                session()->put('UserSession',$usuario);
                return redirect('/dashboard/routerboard');
            }       
        }
        return redirect('/login')->with('status', 'Email o password incorrecto!');
    }

    public function logout(){
            session()->forget('UserSession');
            session()->forget('routerConnected');
            return redirect('/login');
        
    }
    
    public function issSession(){
        return (session()->has('UserSession'));
    }

//----------------------------------------------------REGISTER--------------------------------------------------
    public function indexregister(){
        if (session()->has('UserSession')) {
            if (session()->has('routerConnected')) {
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router; 
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $inforouter = session()->get('routerConnected');
                    $uidSesion = session()->get('UserSession')->id;
                    $user = User::find($uidSesion);
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $getactive =(new Query('/ip/hotspot/active/print'));
                    $active = $client->query($getactive)->read();
                    $getusers =(new Query('/ip/hotspot/user/print'));
                    $usersall = $client->query($getusers)->read();
                    $costos = DetailVoucher::sum('price_detailv');
                    
                    $getallresources = (new Query('/system/resource/print'));
                    $resources = $client->query($getallresources)->read();
                    $freememory = $resources[0]['free-memory'];
                    $totalmemory = $resources[0]['total-memory'];
                    $resta = ($totalmemory - $freememory);
                
                    $total = $this->formatBytes($totalmemory);
                    $free = $this->formatBytes($freememory);
                    $rest = $this->formatBytes($resta);
                
                    return view('mikvo.dashboard.layouts.main',["freememory"=>$free, "restmemeory"=>$rest,'costos'=>$costos,'usersall'=>$usersall, 'active'=>$active,'router'=>$inforouter, 'user' => $user ] );
                }
            }
        } 
        return redirect('/dashboard/routerboard');
    }

    public function register(Request $request){
        
        if(!session()->has('UserSession')){
            $user = new User;
            $user->fullname_user = $request->input('fullname_user');
            $user->user_name = $request->input('user_name');
            $user->telephone_user = $request->input('telephone_user');
            $user->email_user = $request->input('email_user');
            $user->password_user = Hash::make($request->input('password_user'));
            
            $user->save();

        return redirect('/login');
        }
        $id = session()->get('UserSession')->id;
        $user = User::find($id);
        return view('mikvo.dashboard.layouts.main',['user'=>$user]);
    }

//------------------------------------------------------USER------------------------------------------------------    
    public function indexuser()
    {
        if (session()->has('UserSession')){
            $id = session()->get('UserSession')->id;
            $user = User::find($id);
            return view('mikvo.dashboard.modules.user.userprofile',['user'=>$user]);
        }
        return view('welcome');
    }

    public function edit($id)
    {
        if (session()->has('UserSession')){
            $user = User::find($id);
            return view('mikvo.dashboard.modules.user.updateuser',['user'=>$user]);
        }
        return view('welcome');
    }

    public function update(Request $request,$id)
    {
        if(session()->has('UserSession')){
            $user = User::find($id);
            $user->fullname_user = $request->input('fullname_user');
            $user->user_name = $request->input('user_name');
            $user->telephone_user = $request->input('telephone_user');

            if ($request->hasFile('img_user')) {
                $imagen = explode(",", $user->img_user);
                Storage::delete($user->img_user);
                $user->img_user = $request->input('img_user');
                $user->img_user = $request->file('img_user')->store('/');
            }

            $user->save();
            return redirect('/dashboard/user')->with('message','Guardado Satisfactoriamente !');
        }
        return view('welcome');
    }


    //--------------------------------------------------UPDATE PASSWORD---------------------------------------------------    

    public function password($id)
    {
        if(session()->has('UserSession')){
            $user = User::find($id);
            return view('mikvo.dashboard.modules.user.changepassword',['user'=>$user]);
        }
        return view('welcome');
    }

    public function updatepassword(Request $request, $id){
        $user = User::find($id);
        $password_user = $request->input('password_user');
        $password_new = $request->input('password_new');
        $password_repeat = $request->input('password_repeat');
        if(Hash::check($password_user,$user->password_user)){
            if($password_new == $password_repeat){
                $user->password_user = Hash::make($password_repeat);
            }   
            $user->save();
            return redirect('/dashboard/user')->with('message','Contraseña actualizada Satisfactoriamente !');            
        }else{
            return redirect('/dashboard/user')->with('message','No se actualizo la contraseña!');
        }
    }
}
