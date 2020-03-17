<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use vendor\autoload;
use \RouterOS\Query;
use \RouterOS\Client;
use Illuminate\Support\Collection as Collection;

class ProfilesController extends Controller
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
            if(session()->has('routerConnected')){
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router; 
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $uidSesion = session()->get('UserSession')->id;
                    $user = User::find($uidSesion);
           
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $getallqueue = (new Query('/queue/simple/print'))
                    ->where('dynamic', 'false');        
                    $queue = $client->query($getallqueue)->read();

                    $getpool = (new Query('/ip/pool/print'));        
                    $addpool = $client->query($getpool)->read();

                    return view('mikvo.dashboard.modules.profiles.createprofile', ['user'=> $user, 'getallqueue' => $queue, 'getpool' => $addpool]);                
                }
            }
        }
        return view('welcome');
        
    }

    public function store(Request $request)
    {
        if (session()->has('UserSession')){
            if(session()->has('routerConnected')){
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router;
                $client = "";
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $profile = new Profile;
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $uidSesion = session()->get('UserSession')->id;
                    $name = $request->input('name_profile');
                    $addrpool = $request->input('addpool_profile');
                    $getprice = $request->input('cost_profile');
                    $getsprice = $request->input('sprice_profile');
                    $sharedusers = $request->input('sharedu_profile');
                    $ratelimit = $request->input('vsubida_profile').$request->input('sbyte_profile').'/'.$request->input('vdescarga_profile').$request->input('dbyte_profile');
                    $expmode = $request->input('expmode_profile');
                    $validity = $request->input('validation_profile');
                    $graceperiod = $request->input('gracep_profile');
                    $typetime = $request->input('typet_profile');
                    $limitdays = $request->input('limitda_profiles');
                    $limithours = $request->input('limitho_profiles');
                    $expireday =$request->input('expireda_profiles');
                    $expirehours = $request->input('expiredho_profiles');
                    $cuttime = $request->input('cuttime_profile');
                    $getlock = $request->input('lockuser_profile');
                    $parent = $request->input('parentq_profiles');
                    $price = "";
                    $sprice = "";
                    $limittime = "";
                    $expiretime = "";
                    $look = "";
                    $mode = "";

                    if($getprice ==""){
                        $price = "0";
                    }else{
                        $price = $getprice;
                    }
                    if ($getsprice == "") {
                        $sprice = "0";
                    } else {
                        $sprice = $getsprice;
                    }
                    if($limitdays == null){
                        $limittime = $limithours;
                    }else{
                        $limittime = $limitdays.'d'.$limithours;
                    }
                    if($expireday == null){
                        $expiretime = $expirehours;
                    }else{
                        $expiretime = $expireday.'d'.$expirehours;
                    }
                    if($getlock == "Enable"){
                        $lock = '; [:local mac $"mac-address"; /ip hotspot user set mac-address=$mac [find where name=$user]]';
                    }else{
                        $lock = "";
                    }

                    $randstarttime = "0".rand(1,5).":".rand(10,59).":".rand(10,59);
                    $randinterval = "00:02:".rand(10,59);

                    $record = '; :local mac $"mac-address"; :local time [/system clock get time ]; /system script add name="$date-|-$time-|-$user-|-'.$price.'-|-$address-|-$mac-|-' . $validity . '-|-'.$name.'-|-$comment" owner="$month$year" source=$date comment=mikhmon';
                    $onlogin = ':put (",'.$expmode.',' . $price . ',' . $validity . ','.$sprice.',,' . $getlock . ',"); {:local date [ /system clock get date ];:local year [ :pick $date 7 11 ];:local month [ :pick $date 0 3 ];:local comment [ /ip hotspot user get [/ip hotspot user find where name="$user"] comment]; :local ucode [:pic $comment 0 2]; :if ($ucode = "vc" or $ucode = "up" or $comment = "") do={ /sys sch add name="$user" disable=no start-date=$date interval="' . $validity . '"; :delay 2s; :local exp [ /sys sch get [ /sys sch find where name="$user" ] next-run]; :local getxp [len $exp]; :if ($getxp = 15) do={ :local d [:pic $exp 0 6]; :local t [:pic $exp 7 16]; :local s ("/"); :local exp ("$d$s$year $t"); /ip hotspot user set comment=$exp [find where name="$user"];}; :if ($getxp = 8) do={ /ip hotspot user set comment="$date $exp" [find where name="$user"];}; :if ($getxp > 15) do={ /ip hotspot user set comment=$exp [find where name="$user"];}; /sys sch remove [find where name="$user"]';
                    
                    if ($expmode == "rem") {
                        $onlogin = $onlogin . $lock . "}}";
                        $mode = "remove";
                    } elseif ($expmode == "ntf") {
                        $onlogin = $onlogin . $lock . "}}";
                        $mode = "set limit-uptime=1s";
                    } elseif ($expmode == "remc") {
                        $onlogin = $onlogin . $record . $lock . "}}";
                        $mode = "remove";
                    } elseif ($expmode == "ntfc") {
                        $onlogin = $onlogin . $record . $lock . "}}";
                        $mode = "set limit-uptime=1s";
                    } elseif ($expmode == "0" && $price != "") {
                        $onlogin = ':put (",,' . $price . ',,,noexp,' . $getlock . ',")' . $lock;
                    } else {
                        $onlogin = "";
                      }
                    
                    $bgservice = ':local dateint do={:local montharray ( "jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec" );:local days [ :pick $d 4 6 ];:local month [ :pick $d 0 3 ];:local year [ :pick $d 7 11 ];:local monthint ([ :find $montharray $month]);:local month ($monthint + 1);:if ( [len $month] = 1) do={:local zero ("0");:return [:tonum ("$year$zero$month$days")];} else={:return [:tonum ("$year$month$days")];}}; :local timeint do={ :local hours [ :pick $t 0 2 ]; :local minutes [ :pick $t 3 5 ]; :return ($hours * 60 + $minutes) ; }; :local date [ /system clock get date ]; :local time [ /system clock get time ]; :local today [$dateint d=$date] ; :local curtime [$timeint t=$time] ; :foreach i in [ /ip hotspot user find where profile="'.$name.'" ] do={ :local comment [ /ip hotspot user get $i comment]; :local name [ /ip hotspot user get $i name]; :local gettime [:pic $comment 12 20]; :if ([:pic $comment 3] = "/" and [:pic $comment 6] = "/") do={:local expd [$dateint d=$comment] ; :local expt [$timeint t=$gettime] ; :if (($expd < $today and $expt < $curtime) or ($expd < $today and $expt > $curtime) or ($expd = $today and $expt < $curtime)) do={ [ /ip hotspot user '.$mode.' $i ]; [ /ip hotspot active remove [find where user=$name] ];}}}';
                    if($typetime == "Corrido"){
                        
                        $query =(new Query('/ip/hotspot/user/profile/add'))
                        ->equal('name', $name)
                        ->equal('address-pool', $addrpool)
                        ->equal('session-timeout', $limittime)
                        ->equal('idle-timeout', $limittime)
                        ->equal('keepalive-timeout', '00:00:00')
                        ->equal('rate-limit', $ratelimit)
                        ->equal('shared-users', $sharedusers)
                        ->equal('mac-cookie-timeout', $limittime)
                        ->equal('status-autorefresh','00:01:00')
                        ->equal('transparent-proxy','yes')
                        ->equal('on-login', $onlogin)
                        ->equal('parent-queue', $parent);
                        $out = $client->query($query)->read();

                        
                    }else {
                    
                        $query =(new Query('/ip/hotspot/user/profile/add'))
                        ->equal('name', $name)
                        ->equal('address-pool', $addrpool)
                        ->equal('session-timeout', $limittime)
                        ->equal('keepalive-timeout', $cuttime)
                        ->equal('rate-limit', $ratelimit)
                        ->equal('shared-users', $sharedusers)
                        ->equal('mac-cookie-timeout', $expiretime)
                        ->equal('status-autorefresh','00:02:00')
                        ->equal('transparent-proxy','yes')
                        ->equal('on-login', $onlogin)
                        ->equal('parent-queue', $parent);
                        $out = $client->query($query)->read();  
                    }

                    if($expmode != "0"){
                        $comm = "Monitor Profile ".$name;
                            $query =(new Query('/system/scheduler/add'))
                            ->equal('name', $name)
                            ->equal('start-time', $randstarttime)
                            ->equal('interval',$randinterval)
                            ->equal('on-event',$bgservice)
                            ->equal('disabled', 'no')
                            ->equal('comment', $comm);
                            $out = $client->query($query)->read();
                            //print_r($out);
                    }

                    $uidSesion = session()->get('UserSession')->id;
                    $profile->iduser_profile = $uidSesion;
                    $profile->name_profile = $name;
                    $profile->addpool_profile = $addrpool;                    
                    $profile->cost_profile = $getprice;
                    $profile->sprice_profile = $getsprice;
                    $profile->sharedu_profile = $sharedusers;
                    $profile->vsubida_profile = $request->input('vsubida_profile');
                    $profile->sbyte_profile = $request->input('sbyte_profile');
                    $profile->vdescarga_profile = $request->input('vdescarga_profile');
                    $profile->dbyte_profile = $request->input('dbyte_profile');
                    $profile->expmode_profile = $expmode;
                    if($expmode == "0"){
                        $profile->validation_profile = "0";
                        $profile->gracep_profile = "0";
                    }else if($expmode != "0"){
                        $profile->validation_profile = $validity;
                        $profile->gracep_profile = $graceperiod;
                    }

                    $profile->typet_profile = $typetime;
                    $profile->limitda_profiles = $request->input('limitda_profiles');
                    $profile->limitho_profiles = $request->input('limitho_profiles');
                    if($request->input('typet_profile') == "Corrido"){
                        $profile->expireda_profiles = "0";
                        $profile->expiredho_profiles = "0";
                        $profile->cuttime_profile = "0";
                    }else if($request->input('typet_profile') == "Pausado"){
                        $profile->expireda_profiles = $request->input('expireda_profiles');
                        $profile->expiredho_profiles = $request->input('expiredho_profiles');
                        $profile->cuttime_profile = $cuttime;
                    }
                    
                    $profile->lockuser_profile = $getlock;
                    $profile->parentq_profiles = $parent; 
                    
                    $profile->save();

                    return redirect('/dashboard/profiles')->with('message','Actualizado Satisfactoriamente!');
                    
                }
            }
        }
        return view('welcome');
    }

    public function edit($id)
    {
        if(session()->has('UserSession')){
            if(session()->has('routerConnected')){
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router; 
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $uidSesion = session()->get('UserSession')->id;
                    $user = User::find($uidSesion);
                    $profiles = Profile::find($id);
                    $uidSesion = session()->get('UserSession')->id;
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $getallqueue = (new Query('/queue/simple/print'))
                    ->where('dynamic', 'false');        
                    $result = $client->query($getallqueue)->read();
                    $queue = Collection::make($result);
                   
                    $getpool = (new Query('/ip/pool/print'));        
                    $allpool = $client->query($getpool)->read();
                    $addpool = Collection::make($allpool);

                    return view('mikvo.dashboard.modules.profiles.updateprofile', ['profiles'=>$profiles,'user'=> $user, 'getallqueue' => $queue, 'getpool' => $addpool]);                
                }
            }
          }
        return view('welcome');
    }

    public function update(Request $request, $id)
    {
        if(session()->has('UserSession')){
            if(session()->has('routerConnected')){
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router; 
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $profile = Profile::find($id);
                    $name = $request->input('name_profile');
                    $addrpool = $request->input('addpool_profile');
                    $getprice = $request->input('cost_profile');
                    $getsprice = $request->input('sprice_profile');
                    $sharedusers = $request->input('sharedu_profile');
                    $ratelimit = $request->input('vsubida_profile').$request->input('sbyte_profile').'/'.$request->input('vdescarga_profile').$request->input('dbyte_profile');
                    $expmode = $request->input('expmode_profile');
                    $validity = $request->input('validation_profile');
                    $graceperiod = $request->input('gracep_profile');
                    $typetime = $request->input('typet_profile');
                    $limitdays = $request->input('limitda_profiles');
                    $limithours = $request->input('limitho_profiles');
                    $expireday =$request->input('expireda_profiles');
                    $expirehours = $request->input('expiredho_profiles');
                    $cuttime = $request->input('cuttime_profile');
                    $getlock = $request->input('lockuser_profile');
                    $parent = $request->input('parentq_profiles');
                    $price = "";
                    $sprice = "";
                    $limittime = "";
                    $expiretime = "";
                    $look = "";
                    $mode = "";
                    $idp = "";
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $pprofile = (new Query('/ip/hotspot/user/profile/print'))
                    ->where('name', $name);
                    $getprofile = $client->query($pprofile)->read();
                    $idp = $getprofile[0]['.id'];
                    $pname = $getprofile[0]['name'];
                    //dd($getprofile);
                    $query = (new Query('/system/scheduler/print'))
                    ->where('name', $pname);
                    $getmonexpired = $client->query($query)->read();
                    $monexpired = $getmonexpired[0];
                    $monid = $monexpired['.id'];
                	$pmon = $monexpired['name'];
                	$chkpmon = $monexpired['disabled'];

                    if($getprice ==""){
                        $price = "0";
                    }else{
                        $price = $getprice;
                    }
                    if ($getsprice == "") {
                        $sprice = "0";
                    } else {
                        $sprice = $getsprice;
                    }
                    if($limitdays == null){
                        $limittime = $limithours;
                    }else{
                        $limittime = $limitdays.'d'.$limithours;
                    }
                    if($expireday == null){
                        $expiretime = $expirehours;
                    }else{
                        $expiretime = $expireday.'d'.$expirehours;
                    }

                    if ($getlock == 'Enable') {
                      $lock = '; [:local mac $"mac-address"; /ip hotspot user set mac-address=$mac [find where name=$user]]';
                    } else {
                      $lock = "";
                    }

                    $randstarttime = "0".rand(1,5).":".rand(10,59).":".rand(10,59);
                    $randinterval = "00:02:".rand(10,59);

                    $record = '; :local mac $"mac-address"; :local time [/system clock get time ]; /system script add name="$date-|-$time-|-$user-|-'.$price.'-|-$address-|-$mac-|-' . $validity . '-|-'.$name.'-|-$comment" owner="$month$year" source=$date comment=mikhmon';
    
                    $onlogin = ':put (",'.$expmode.',' . $price . ',' . $validity . ','.$sprice.',,' . $getlock . ',"); {:local date [ /system clock get date ];:local year [ :pick $date 7 11 ];:local month [ :pick $date 0 3 ];:local comment [ /ip hotspot user get [/ip hotspot user find where name="$user"] comment]; :local ucode [:pic $comment 0 2]; :if ($ucode = "vc" or $ucode = "up" or $comment = "") do={ /sys sch add name="$user" disable=no start-date=$date interval="' . $validity . '"; :delay 2s; :local exp [ /sys sch get [ /sys sch find where name="$user" ] next-run]; :local getxp [len $exp]; :if ($getxp = 15) do={ :local d [:pic $exp 0 6]; :local t [:pic $exp 7 16]; :local s ("/"); :local exp ("$d$s$year $t"); /ip hotspot user set comment=$exp [find where name="$user"];}; :if ($getxp = 8) do={ /ip hotspot user set comment="$date $exp" [find where name="$user"];}; :if ($getxp > 15) do={ /ip hotspot user set comment=$exp [find where name="$user"];}; /sys sch remove [find where name="$user"]';

                    if ($expmode == "rem") {
                        $onlogin = $onlogin . $lock . "}}";
                        $mode = "remove";
                      } elseif ($expmode == "ntf") {
                        $onlogin = $onlogin . $lock . "}}";
                        $mode = "set limit-uptime=1s";
                      } elseif ($expmode == "remc") {
                        $onlogin = $onlogin . $record . $lock . "}}";
                        $mode = "remove";
                      } elseif ($expmode == "ntfc") {
                        $onlogin = $onlogin . $record . $lock . "}}";
                        $mode = "set limit-uptime=1s";
                      } elseif ($expmode == "0" && $price != "") {
                        $onlogin = ':put (",,' . $price . ',,,noexp,' . $getlock . ',")' . $lock;
                      } else {
                        $onlogin = "";
                    }

                    $bgservice = ':local dateint do={:local montharray ( "jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec" );:local days [ :pick $d 4 6 ];:local month [ :pick $d 0 3 ];:local year [ :pick $d 7 11 ];:local monthint ([ :find $montharray $month]);:local month ($monthint + 1);:if ( [len $month] = 1) do={:local zero ("0");:return [:tonum ("$year$zero$month$days")];} else={:return [:tonum ("$year$month$days")];}}; :local timeint do={ :local hours [ :pick $t 0 2 ]; :local minutes [ :pick $t 3 5 ]; :return ($hours * 60 + $minutes) ; }; :local date [ /system clock get date ]; :local time [ /system clock get time ]; :local today [$dateint d=$date] ; :local curtime [$timeint t=$time] ; :foreach i in [ /ip hotspot user find where profile="'.$name.'" ] do={ :local comment [ /ip hotspot user get $i comment]; :local name [ /ip hotspot user get $i name]; :local gettime [:pic $comment 12 20]; :if ([:pic $comment 3] = "/" and [:pic $comment 6] = "/") do={:local expd [$dateint d=$comment] ; :local expt [$timeint t=$gettime] ; :if (($expd < $today and $expt < $curtime) or ($expd < $today and $expt > $curtime) or ($expd = $today and $expt < $curtime)) do={ [ /ip hotspot user '.$mode.' $i ]; [ /ip hotspot active remove [find where user=$name] ];}}}';
                    
                    if($typetime == "Corrido"){
                        
                        $query =(new Query('/ip/hotspot/user/profile/set'))
                        ->equal('.id', $idp)
                        ->equal('name', $name)
                        ->equal('address-pool', $addrpool)
                        ->equal('session-timeout', $limittime)
                        ->equal('idle-timeout', $limittime)
                        ->equal('keepalive-timeout', '00:00:00')
                        ->equal('rate-limit', $ratelimit)
                        ->equal('shared-users', $sharedusers)
                        ->equal('mac-cookie-timeout', $limittime)
                        ->equal('status-autorefresh','00:01:00')
                        ->equal('transparent-proxy','yes')
                        ->equal('on-login', $onlogin)
                        ->equal('parent-queue', $parent);
                        $out = $client->query($query)->read();

                        dd($out);
                    }else {
                    
                        $query =(new Query('/ip/hotspot/user/profile/set'))
                        ->equal('.id', $idp)
                        ->equal('name', $name)
                        ->equal('address-pool', $addrpool)
                        ->equal('session-timeout', $limittime)
                        ->equal('keepalive-timeout', $cuttime)
                        ->equal('rate-limit', $ratelimit)
                        ->equal('shared-users', $sharedusers)
                        ->equal('mac-cookie-timeout', $expiretime)
                        ->equal('status-autorefresh','00:02:00')
                        ->equal('transparent-proxy','yes')
                        ->equal('on-login', $onlogin)
                        ->equal('parent-queue', $parent);
                        $out = $client->query($query)->read();  
                        print_r($out);
                    }

                    if($expmode != "0"){
                        if (empty($monid)){
                            $comm = "Monitor Profile ".$name;
                            $query =(new Query('/system/scheduler/add'))
                            ->equal('name', $name)
                            ->equal('start-time', $randstarttime)
                            ->equal('interval',$randinterval)
                            ->equal('on-event',$bgservice)
                            ->equal('disabled', 'no')
                            ->equal('comment', $comm);
                            $out = $client->query($query)->read();
                            //print_r($out);
                        }else{
                            $comm = "Monitor Profile ".$name;
                            $query =(new Query('/system/scheduler/set'))
                            ->equal(".id", $monid)
                            ->equal('name', $name)
                            ->equal('start-time', $randstarttime)
                            ->equal('interval',$randinterval)
                            ->equal('on-event',$bgservice)
                            ->equal('disabled', 'no')
                            ->equal('comment', $comm);
                        }
                        
                    }else{
                        $query =(new Query('/system/scheduler/remove'))
                        ->where('.id', $monid);
                    }
                   
                    $uidSesion = session()->get('UserSession')->id;
                    $profile->iduser_profile = $uidSesion;
                    $profile->name_profile = $name;
                    $profile->addpool_profile = $addrpool;                    
                    $profile->cost_profile = $getprice;
                    $profile->sprice_profile = $getsprice;
                    $profile->sharedu_profile = $sharedusers;
                    $profile->vsubida_profile = $request->input('vsubida_profile');
                    $profile->sbyte_profile = $request->input('sbyte_profile');
                    $profile->vdescarga_profile = $request->input('vdescarga_profile');
                    $profile->dbyte_profile = $request->input('dbyte_profile');
                    $profile->expmode_profile = $expmode;
                    if($expmode == "0"){
                        $profile->validation_profile = "0";
                        $profile->gracep_profile = "0";
                    }else if($expmode != "0"){
                        $profile->validation_profile = $validity;
                        $profile->gracep_profile = $graceperiod;
                    }

                    $profile->typet_profile = $typetime;
                    $profile->limitda_profiles = $request->input('limitda_profiles');
                    $profile->limitho_profiles = $request->input('limitho_profiles');
                    if($request->input('typet_profile') == "Corrido"){
                        $profile->expireda_profiles = "0";
                        $profile->expiredho_profiles = "0";
                        $profile->cuttime_profile = "0";
                    }else if($request->input('typet_profile') == "Pausado"){
                        $profile->expireda_profiles = $request->input('expireda_profiles');
                        $profile->expiredho_profiles = $request->input('expiredho_profiles');
                        $profile->cuttime_profile = $cuttime;
                    }
                    
                    $profile->lockuser_profile = $getlock;
                    $profile->parentq_profiles = $parent; 
                    
                    $profile->save();

                    return redirect('/dashboard/profiles')->with('message','Actualizado Satisfactoriamente!');
                }
            }            
        }
        return view('welcome');
    }

    public function destroy($id)
    {
        if(session()->has('UserSession')){
            if(session()->has('routerConnected')){
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router; 
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $profile = Profile::find($id);

                    $pprofile = (new Query('/ip/hotspot/user/profile/print'))
                    ->where('name', $profile->name_profile);
                    $getprofile = $client->query($pprofile)->read();
                    $idp = $getprofile[0]['.id'];
                    $pname = $getprofile[0]['name'];
                    
                    $query = (new Query('/system/scheduler/print'))
                    ->where('name', $pname);
                    $getmonexpired = $client->query($query)->read();
                    $monexpired = $getmonexpired[0];
                    $monid = $monexpired['.id'];


                    $prof =(new Query('/ip/hotspot/user/profile/remove'))
                    ->equal('.id', $idp);
                    $removepro = $client->query($prof)->read();
                    dd($removepro);
                    $sched =(new Query('/system/scheduler/remove'))
                    ->equal('.id', $monid);
                    $removesche = $client->query($sched)->read();
                    
                    Profile::destroy($id);
                    return redirect('/dashboard/profiles');
                }
            }
            

            
        }
        return view('welcome');
    }
}