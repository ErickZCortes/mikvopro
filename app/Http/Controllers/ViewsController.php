<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ViewsController extends Controller
{
    public function viewdashboard()
    {
        if(session()->has('UserSession')){
            $id = session()->get('UserSession')->id;
            $user = User::find($id);
            return view('mikvo.dashboard.layouts.main',['user'=>$user]);
        }
        return view('welcome');
    }
}
