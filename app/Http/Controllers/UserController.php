<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

//-----------------------------------------------------LOGIN---------------------------------------------
    public function index(){
        if(!session()->has('UserSession')){
            return view('mikvo.login');    
        }
        $id = session()->get('UserSession')->id;
        $user = User::find($id);
        return view('mikvo.dashboard.layouts.main',['user'=>$user]);
    }
    public function login(){
        if($this->isSession()){
            return redirect(('/dashboard'));
        }
        return view('welcome');
    }
    public function loginSession(Request $request){
        $password_user = $request->input('password_user');
        $usuario = User::where('email_user',$request->input('email_user'))->first();
        if(isset($usuario)){
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
        if(!session()->has('UserSession')){
            return view('mikvo.register');    
        }
        $id = session()->get('UserSession')->id;
        $user = User::find($id);
        return view('mikvo.dashboard.layouts.main',['user'=>$user]);
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
