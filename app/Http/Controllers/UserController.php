<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{

    public function login(){
        if($this->isSession()){
            return redirect(('/dashboard'));
        }
        return view('mikvo.login');
    }

    public function loginSession(Request $request){
        $password_user = $request->input('password_user');
        $usuario = User::where('email_user',$request->input('email_user'))->first();
        if(isset($usuario)){
            //if(Hash::check($password_user,$usuario->passowrd_user)){
                session()->put('UserSession',$usuario);
                //dd($usuario);
                return redirect('/dashboard');
            //}
            
            
        }
        return redirect('/login')->with('status', 'Email o password incorrecto!');
    }

    public function logout(){
        session()->forget('UserSession');
        return redirect('/welcome');
    }

    public function issSession(){
        return (session()->has('UserSession'));
    }



    /*public function login(){
        $credentials = $this->validate(request(),[
            'email_user'=> 'email|required|string',
            'password_user'=>'required|string'
        ]);


        if(Auth::attempt($credentials)){
            return 'see brooo';
        }
        return 'ahorita no joven';
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
