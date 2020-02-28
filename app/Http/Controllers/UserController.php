<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{

//////////////////////////////////////////////Login//////////////////////////////////////////////////////
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
            //dd($usuario);
            if(Hash::check($password_user,$usuario->password_user)){
                session()->put('UserSession',$usuario);
                return redirect('/dashboard');
            }
            
            
        }
        return redirect('/login')->with('status', 'Email o password incorrecto!');
    }

    public function logout(){
        session()->forget('UserSession');
        return redirect('/login');
    }

    public function issSession(){
        return (session()->has('UserSession'));
    }
    
////////////////////////////////////////////////Register/////////////////////////////////////////////////////////////////

    public function register(Request $request){
        $user = new User;
        $user->fullname_user = $request->input('fullname_user');
        $user->user_name = $request->input('user_name');
        $user->telephone_user = $request->input('telephone_user');
        $user->email_user = $request->input('email_user');
        $user->password_user = Hash::make($request->input('password_user'));

        $user->save();

        return redirect('/login');
    }

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
