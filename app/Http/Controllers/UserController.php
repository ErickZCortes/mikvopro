<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

//-----------------------------------------------------LOGIN---------------------------------------------
    public function index(){
        return view('mikvo.login');
    }
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

//----------------------------------------------------REGISTER--------------------------------------------------
    public function indexregister(){
        return view('mikvo.register');
    }
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

//------------------------------------------------------USER------------------------------------------------------    
    public function indexuser()
    {
        if (session()->has('UserSession')){
            $id = session()->get('UserSession')->id;
            $user = User::find($id);
            return view('mikvo.dashboard.modules.user.userprofile',['user'=>$user]);
        }
    }

    public function edit($id)
    {
        if (session()->has('UserSession')){
            $user = User::find($id);
            return view('mikvo.dashboard.modules.user.updateuser',['user'=>$user]);
        }
    }

    public function update(Request $request,$id)
    {
        if(session()->has('UserSession')){
            $user = User::find($id);
            $user->fullname_user = $request->input('fullname_user');
            $user->user_name = $request->input('user_name');
            $user->telephone_user = $request->input('telephone_user');
            //$user->password_user = $request->input('password_user');
            //
            //session()->push('UserSession.fullname_user', $user->fullname_user);
            //session()->push('UserSession.user_name', 'developers');
            //session()->push('UserSession.telephone_user', 'developers');
            //session()->push('UserSession.password_user', 'developers');
            //session()->push(['UserSession.fullname_user', 'developers'], ['UserSession.user_name', 'developers'], ['UserSession.telephone_user', 'developers'], ['UserSession.password_user', 'developers']);
            if ($request->hasFile('img_user')) {
                $imagen = explode(",", $user->img_user);
                Storage::delete($user->img_user);
                //Storage::disk('local')->delete('public_path/uploads/',$user->img_user);
                    $user->img_user = $request->input('img_user');
                    $user->img_user = $request->file('img_user')->store('/');
                
                
            }
        }
        $user->save();

        return redirect('/dashboard/user')->with('message','Guardado Satisfactoriamente !');
    }
}
