<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function viewlogin(){
        return view('mikvo.login');
    }

    public function viewregister(){
        return view('mikvo.register');
    }

    public function viewdashboard()
    {
        if(session()->has('UserSession')){
            return view('mikvo.dashboard.layouts.main');
        }
        return view('mikvo.login');
    }

    public function viewuser()
    {
        return view('mikvo.dashboard.layouts.main');
    }

    public function viewprofiles()
    {
        return view('mikvo.dashboard.layouts.main');
    }

    public function viewrouterboard()
    {
        return view('mikvo.dashboard.layouts.main');
    }

    public function viewvouchers()
    {
        return view('mikvo.dashboard.layouts.main');
    }


}
