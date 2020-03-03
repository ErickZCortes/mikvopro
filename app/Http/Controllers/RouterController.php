<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Router;
use App\User;

class RouterController extends Controller
{    
    public function index()
    {
        $routers = Router::all();
        return view('mikvo.dashboard.modules.routerboard.routerboard', compact('routers')); 
    }
    public function create()
    {
        $routers = Router::all();
        return view('mikvo.dashboard.modules.routerboard.createrouter', compact('routers'));
    }
    public function store(Request $request)
    {
        $router = new Router; 
        
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;

            $router->iduser_router = $uidSesion;
            $router->model_router = $request->input('model_router');
            $router->router_description = $request->input('router_description');
            $router->ip_router = $request->input('ip_router');
            $router->user_router = $request->input('user_router');
            $router->password_router = $request->input('password_router');    
        }
          $router->save();
        
        return redirect('/dashboard/routerboard')->with('message','Guardado Satisfactoriamente !');
    }

    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $routers = Router::find($id);
        return view('mikvo.dashboard.modules.routerboard.updaterouter',['routers'=>$routers]);
    }

    public function update(Request $request, $id)
    {
        $router = Router::find($id);
        $router->model_router = $request->input('model_router');
        $router->router_description = $request->input('router_description');
        $router->ip_router = $request->input('ip_router');
        $router->user_router = $request->input('user_router');
        $router->password_router = $request->input('password_router');

        $router->save();

        return redirect('/dashboard/routerboard')->with('message','Guardado Satisfactoriamente !');
    }

    public function destroy($id)
    {
        $router = Router::find($id);

        Router::destroy($id);
        return redirect('/dashboard/routerboard');
    }
}