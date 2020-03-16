<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Paginate;
use App\Router;
use App\User;
use vendor\autoload;
use \RouterOS\Query;
use \RouterOS\Client;


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

    public function conectrouter($id)
    {
        if (session()->has('UserSession')){
            $router = Router::find($id);
        session()->put('routerConnected',$router);
            if (session()->has('routerConnected')) {
                return redirect('/dashboard/routerboard')->with('message','Conectado!');
            }else {
                return redirect('/dashboard/routerboard')->with('message','n!');
            }
        }
        return view('welcome');
    }

    public function index()
    {
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $routers = Router::where('iduser_router', $uidSesion)->paginate(5);
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
            
            return redirect('/dashboard/routerboard')->with('message','Guardado Satisfactoriamente !');
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
            $router->password_router = $request->input('password_router');
            $router->port_router = $request->input('port_router');
            $router->save();
    
            return redirect('/dashboard/routerboard')->with('message','Guardado Satisfactoriamente !');
        }
        return view('welcome');
    }

    public function destroy($id)
    {
        if (session()->has('UserSession')){

            Router::destroy($id);
            return redirect('/dashboard/routerboard');
        }
        return view('welcome');

    }
}