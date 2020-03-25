<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Paginate;
use App\Router;
use App\User;
use vendor\autoload;
use \RouterOS\Query;
use \RouterOS\Client;
use App\DetailVoucher;
use RealRashid\SweetAlert\Facades\Alert;
use DB;


class RouterController extends Controller
{    
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
    
    public function conectrouter($id)
    {
        if (session()->has('UserSession')){
            $router = Router::find($id);
            session()->put('routerConnected',$router);
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

                    $getscripts = (new Query('/system/script/print'));
                    $scripts = $client->query($getscripts)->read();
                    Alert::toast('Conectado', 'success')->position('top-end')->autoClose(3000);
                    return view('mikvo.dashboard.layouts.main',["scripts"=>$scripts,"freememory"=>$free, "restmemeory"=>$rest,'costos'=>$costos,'usersall'=>$usersall, 'active'=>$active,'router'=>$inforouter, 'user' => $user ] );
                }else{
                    Alert::toast('Fallo la conexión', 'error')->position('top-end')->autoClose(3000);
                    return redirect('/dashboard/routerboard/');
                }
            }    
        }
        return view('welcome');
    }

    public function index()
    {
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $routers = Router::where('iduser_router', $uidSesion)->paginate(10);
            //dd($routers);
            $user = User::find($uidSesion);

            return view('mikvo.dashboard.modules.routerboard.routerboard',['routers'=>$routers, 'user' => $user ] ); 
        }
        return view('welcome');
    }
    public function create()
    {
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            return view('mikvo.dashboard.modules.routerboard.createrouter', ['user'=>$user]);
        }
        return view('welcome');
    }
     public function store(Request $request)
    {
        if (session()->has('UserSession')){
            $router = new Router;
            $uidSesion = session()->get('UserSession')->id;
            $ip = $request->input('ip_router');
            $user = $request->input('user_router');
            $pass = $request->input('password_router');
            $port = $request->input('port_router');
            if($this->connect($ip, $user, $pass, $port)){
               
                $client = $this->connect($ip, $user, $pass, $port);
                //dd($client);

                $query =(new Query('/system/routerboard/print'));
                $out = $client->query($query)->read();
                $router->iduser_router = $uidSesion;
                $router->ip_router = $ip;
                $router->user_router = $user;
                if ($pass == null ) {
                    $pass = "";
                }
                $router->password_router = $pass;
                $router->port_router = $port;    
                $router->name_router = $out[0]['board-name'];
                $router->model_router = $out[0]['model'];
                $router->serialn_router = $out[0]['serial-number'];
            }
                
            $router->save();
            Alert::success('¡Guardado con éxito!')->autoClose(3000);
            return redirect('/dashboard/routerboard');
            
        }
        return view('welcome');     
    }

    public function edit($id)
    {
        if (session()->has('UserSession')){
            $routers = Router::find($id);
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            return view('mikvo.dashboard.modules.routerboard.updaterouter',['routers'=>$routers, 'user'=>$user]);
        }
        return view('welcome');
    }

    public function update(Request $request, $id)
    {
        if (session()->has('UserSession')){
            $router = Router::find($id);
            $router->ip_router = $request->input('ip_router');
            $router->user_router = $request->input('user_router');
            $pass = $request->input('password_router');

            if ($pass == null ) {
                $pass = "";
            }
            $router->password_router = $pass;

            $router->port_router = $request->input('port_router');
            $router->save();
    
            Alert::success('Guardado satisfactoriamente')->autoClose(3000);
            return redirect('/dashboard/routerboard');
        }
        return view('welcome');
    }

    public function destroy($id)
    {
        if (session()->has('UserSession')){

            Router::destroy($id);
            Alert::success('Registro eliminado')->autoClose(3000);
            return redirect('/dashboard/routerboard');
            
        }
        return view('welcome');

    }
    public function search(Request $request){
        
        $fields = ['author_id', 'category_id'];
        foreach($fields as $field){
            if(!empty($request->$field)){
                $query->where($field, '=', $request->$field);
            }
        }
    }

    public function searchrouter(Request $request){
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $search = $request->get('search');
            $routers = DB::table('routers')->where('user_router', 'like', '%'.$search.'%')->paginate(10);
            return view('mikvo.dashboard.modules.routerboard.routerboard', ["user"=>$user, "routers"=>$routers]);
        }
        return view('welcome');
    }
}