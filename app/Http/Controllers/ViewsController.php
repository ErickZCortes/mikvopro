<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use vendor\autoload;
use \RouterOS\Query;
use \RouterOS\Client;
use App\DetailVoucher;


class ViewsController extends Controller
{
    public function connect($ip,$user,$pass,$port){
        if($pass === null){
            $client = new Client([
                'host' => $ip,
                'user' => $user,
                'pass' => '',
                'port' => (int)$port,
            ]);
            return $client;
        }else{
            $client = new Client([
                'host' => $ip,
                'user' => $user,
                'pass' => $pass,
                'port' => (int)$port,
            ]);
            return $client;
        }
    }

    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MiB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision);
        } else {
            return $size;
        }
    }
    public function viewdashboard()
    {
        if(session()->has('UserSession')){
            if(session()->has('routerConnected')){
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router; 
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $inforouter = session()->get('routerConnected');
                    $id = session()->get('UserSession')->id;
                    $user = User::find($id);
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $getactive =(new Query('/ip/hotspot/active/print'));
                    $active = $client->query($getactive)->read();
                    $getusers =(new Query('/ip/hotspot/user/print'));
                    $usersall = $client->query($getusers)->read();
                    $costos = DetailVoucher::sum('price_detailv');
                    
                    $getallresources = (new Query('/system/resource/print'));
                    $resources = $client->query($getallresources)->read();
                    $freememory = $resources[0]['free-memory'];
                    $totalmemory = $resources[0]['total-memory'];
                    $resta = ($totalmemory - $freememory);

                    $total = $this->formatBytes($totalmemory);
                    $free = $this->formatBytes($freememory);
                    $rest = $this->formatBytes($resta);
                    
                    return view('mikvo.dashboard.layouts.main',["freememory"=>$free, "restmemeory"=>$rest,'costos'=>$costos,'usersall'=>$usersall, 'active'=>$active,'router'=>$inforouter,'user'=>$user]);
                }   
            }
        }
        return view('welcome');
    }
    public function viewdasheader()
    {
        if(session()->has('UserSession')){
            $id = session()->get('UserSession')->id;
            $user = User::find($id);
            return view('mikvo.dashboard.shared.header',['user'=>$user]);
        }
        return view('welcome');
    }

}
