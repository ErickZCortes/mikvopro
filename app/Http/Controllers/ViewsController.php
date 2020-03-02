<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    

    public function viewdashboard()
    {
        if(session()->has('UserSession')){
            return view('mikvo.dashboard.layouts.main');
        }
        return view('mikvo.login');
    }

    public function viewdesignvoucher()
    {
        return view('mikvo.dashboard.modules.designvoucher');
    }

    public function viewreprintvouchers()
    {
        return view('mikvo.dashboard.modules.reprintvoucher');
    }

}
