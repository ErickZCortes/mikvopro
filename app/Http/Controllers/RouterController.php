<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Paginate;
use App\Router;
use App\User;

class RouterController extends Controller
{    
    public function index()
    {
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $routers = Router::where('iduser_router', $uidSesion)->paginate(5);
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
            $router->iduser_router = $uidSesion;
            $router->model_router = $request->input('model_router');
            $router->router_description = $request->input('router_description');
            $router->ip_router = $request->input('ip_router');
            $router->user_router = $request->input('user_router');
            $router->password_router = $request->input('password_router');    

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
            $router->model_router = $request->input('model_router');
            $router->router_description = $request->input('router_description');
            $router->ip_router = $request->input('ip_router');
            $router->user_router = $request->input('user_router');
            $router->password_router = $request->input('password_router');
    
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