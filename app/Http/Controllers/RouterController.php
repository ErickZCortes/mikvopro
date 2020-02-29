<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Router;

class RouterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routers = Router::all();
        return view('mikvo.dashboard.modules.index', compact('routers')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routers = Router::all();
        return view('mikvo.dashboard.modules.create', compact('routers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $router = new Router; 
 
        // Recibo todos los datos del formulario de la vista 'crear.blade.php'
        $router->model_router = $request->input('model_router');
        $router->router_description = $request->input('router_description');
        $router->ip_router = $request->input('ip_router');
        $router->user_router = $request->input('user_router');
        $router->password_router = $request->input('password_router');
        
       
        // Inserto todos los datos en mi tabla 'jugos' 
        $router->save();
        
        // Hago una redirección a la vista principal con un mensaje 
        return redirect('mikvo/dashboard/modules/routerboard')->with('message','Guardado Satisfactoriamente !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $router = Router::find($id);
        return view('mikvo/dashboard/modules/routerboard.edit',['routers'=>$router]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $router = Router::find($id);
        $router->model_router = $request->input('model_router');
        $router->router_description = $request->input('router_description');
        $router->ip_router = $request->input('ip_router');
        $router->user_router = $request->input('user_router');
        $router->password_router = $request->input('password_router');

        $router->save();

        return view('mikvo/dashboard/modules/routerboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $router = Router::find($id);

        Router::destroy($id);
        return Redirect::to('mikvo/dashboard/modules/routerboard');
    }
}