<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

class ProfilesController extends Controller
{
 
    public function index()
    {
        if(session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $profiles = Profile::where('iduser_profile', $uidSesion)->paginate(5);
            return view('mikvo.dashboard.modules.profiles.profiles', ["profiles"=>$profiles, "user"=>$user]);               
        }
        return view('welcome');
    }

    public function create()
    {
        if(session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            return view('mikvo.dashboard.modules.profiles.createprofile', ["user"=>$user]);           
        }
        return view('welcome');
    }

    public function store(Request $request)
    {
        if (session()->has('UserSession')){
            $profile = new Profile; 

            $uidSesion = session()->get('UserSession')->id;
            $profile->iduser_profile = $uidSesion;
            $profile->name_profile = $request->input('name_profile');
            $profile->addpool_profile = $request->input('addpool_profile');
            $profile->vsubida_profile = $request->input('vsubida_profile');
            $profile->sbyte_profile = $request->input('sbyte_profile');
            $profile->vdescarga_profile = $request->input('vdescarga_profile');
            $profile->dbyte_profile = $request->input('dbyte_profile');
            $money = number_format($request->input('cost_profile'),2);
            $profile->cost_profile = "$".$money = number_format($request->input('cost_profile'),2);
            $profile->typet_profile = $request->input('typet_profile');
            $profile->limitda_profiles = $request->input('limitda_profiles');
            $profile->limitho_profiles = $request->input('limitho_profiles');
            if($request->input('typet_profile') == "Corrido"){
                $profile->expireda_profiles = '0';
                $profile->expiredho_profiles = '00:00:00';
            }else if($request->input('typet_profile') == "Pausado"){
                $profile->expireda_profiles = $request->input('expireda_profiles');
                $profile->expiredho_profiles = $request->input('expiredho_profiles');
            }
            
            
            $profile->cuttime_profile = $request->input('cuttime_profile');  

            $profile->save();        
        return redirect('/dashboard/profiles')->with('message','Guardado Satisfactoriamente !'); 
        }
        return view('welcome');
    }

    public function edit($id)
    {
        if(session()->has('UserSession')){
            $profiles = Profile::find($id);
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            return view('mikvo.dashboard.modules.profiles.updateprofile',['profiles'=>$profiles, "user"=>$user]);
        }
        return view('welcome');
    }

    public function update(Request $request, $id)
    {
        if(session()->has('UserSession')){
            $profile = Profile::find($id);
            $profile->name_profile = $request->input('name_profile');
            $profile->addpool_profile = $request->input('addpool_profile');
            $profile->vsubida_profile = $request->input('vsubida_profile');
            $profile->sbyte_profile = $request->input('sbyte_profile');
            $profile->vdescarga_profile = $request->input('vdescarga_profile');
            $profile->dbyte_profile = $request->input('dbyte_profile');
            $profile->cost_profile = $request->input('cost_profile');
            $profile->typet_profile = $request->input('typet_profile');
            $profile->limitda_profiles = $request->input('limitda_profiles');
            $profile->limitho_profiles = $request->input('limitho_profiles');
            $profile->expireda_profiles = $request->input('expireda_profiles');
            $profile->expiredho_profiles = $request->input('expiredho_profiles');
            $profile->cuttime_profile = $request->input('cuttime_profile');   

        $profile->save();

        return redirect('/dashboard/profiles')->with('message','Actualizado Satisfactoriamente!');
        }
        return view('welcome');
    }

    public function destroy($id)
    {
        if(session()->has('UserSession')){
            $profile = Profile::find($id);

            Profile::destroy($id);
            return redirect('/dashboard/profiles');
        }
        return view('welcome');
    }
}