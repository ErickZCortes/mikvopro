<?php
namespace App\Http\Controllers; 
use \RouterOS\Client;

use Illuminate\Http\Request; 
use vendor\autoload;
use \RouterOS\Query;

    
class MikrotikController extends Controller{    
        
    public function conection(){
        $client = new Client([
            'host' => '20.20.10.1',
            'user' => 'admin',
            'pass' => '',
            'port' => 8728,
        ]);

        $getallqueue = (new Query('/ip/hotspot/user/profile/print'));        
        $out = $client->query($getallqueue)->read();
        dd($out);
        
        //$getpool = (new Query('/ip/pool/print'));
        //$out = $client->query($getpool)->read();
        //print_r($out);







        /*$query =(new Query('/ip/hotspot/user/profile/add'))
        ->equal('name','profile')
        ->equal('address-pool','none')
        ->equal('rate-limit','256k/512k')
        ->equal('shared-users','1')
        ->equal('status-autorefresh','00:02:00')
        ->equal('transparent-proxy','yes')
        ->equal('on-login','00:02:00')
        ->equal('parent-queue','00:02:00');
        $out = $client->query($query)->read();
       
        dd($out);
        */
        
        
        
        
        
        
        
        /* Initiate client with config object
        
        $client = new Client($config);

        $query =(new Query('/ip/hotspot/user/add'))
        ->equal('server','all')
        ->equal('name','eney1')
        ->equal('password','1234')
        ->equal('profile','default')
        ->equal('limit-uptime','00:02:00');
        
        
        $out = $client->query($query)->read();
        print_r(json_encode($out));*/
        

//--------------------------------------------------------------------------------------------------------------

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

/*
**Expired Mode adalah kontrol untuk user hotspoth.

Pilihan: Remove, Notice, Remove & Record, Notice & Record.
*Remove: User akan dihapus ketika sudah grace period habis.
*Notice: User tidah dihapus dan akan mendapatkan notifikasi setelah user expired.
* Record: Menyimpan data harga tiap user yang login. Untuk menghitung total penjualan user hotspot dan ditampilkan dalam laporan penjualan.

Grace Period: Tenggang watku sebelum user dihapus.
Lock User: Username/Kode voucher hanya bisa digunakan pada 1 perangkat saja.

Format Validity & Grace Period.
[wdhm] Contoh: 30d = 30 hari, 12h = 12jam, 5m = 5menit


**El modo caducado es un control para usuarios de zonas calientes.

Opciones: Eliminar, Aviso, Eliminar y grabar, Aviso y grabar.
* Eliminar: el usuario se eliminará cuando finalice el período de gracia.
* Aviso: el usuario no se ha eliminado y recibirá una notificación una vez que haya expirado.
* Registro: almacena los datos de precios para cada usuario que inicia sesión. Para calcular las ventas totales de los usuarios de puntos de acceso y se muestran en el informe de ventas.

Período de gracia: Grace es mi tiempo antes de que se elimine al usuario.
Bloquear usuario: el nombre de usuario / código de cupón solo se puede usar en 1 dispositivo.

Validez y formato del período de gracia.
[wdhm] Ejemplo: 30d = 30 días, 12h = 12 horas, 5m = 5 minutos
*/

/*
Para tiempo corrido : 
se agrega el tiempo a session timeout
se agrega el tiempo a lde timeout lo mismo que session
se desactiva keepalive timeout
mac cookies se le pone lo mismo que session 

Para perfil pausado vemos :v 
El mac cookies es para expira en:
supongo que también el session
desconectar en : es el keepalive :B  
*/


    //Primero obtengo  los parent queue
    $getallqueue = (new Query('/queue/simple/print'));        
    $out = $client->query($getallqueue)->read();
    dd($out);

    //Después obtengo todos los pool
    $getpool = (new Query('/queue/simple/print'));        
    $out = $client->query($getpool)->read();
    dd($out);

    //Luego pasamos todo a variables porque las variables son necesarias
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

    //aquí comparamos los datos obtenidos de los inputs para aplicar el valor correcto para la bd y mikrotik
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

    if($$expireday == null){
        $expiretime = $expirehours;
    }else{
        $expiretime = $$expireday.'d'.$expirehours;
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

    //Aquí conectamos al router y creamos el perfil
    if($this->connect($ip, $user, $pass, $port)){
        if($typetime == "Corrido"){
            $client = $this->connect($ip, $user, $pass, $port);
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
        }else if($typetime == "Pausado"){
            $client = $this->connect($ip, $user, $pass, $port);
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
        $client = $this->connect($ip, $user, $pass, $port);
        
        
        if($expmode != "0"){
            if (empty($monid)){
                $query =(new Query('/system/scheduler/add'))
                ->equal('name', $name)
                ->equal('start-time', $randstarttime)
                ->equal('interval',$randinterval)
                ->equal('on-event',$bgservice)
                ->equal('disabled', 'no')
                ->equal('comment', "Monitor Profile $name");
            }else{
                $query =(new Query('/system/scheduler/set'))
                ->equal('.id', $monid)
                ->equal('name', $name)
                ->equal('start-time',$randstarttime)
                ->equal('interval',$randinterval)
                ->equal('on-event', $bgservice)
                ->equal('disabled', 'no')
                ->equal('comment', "Monitor Profile $name");
            
            }
        }else{
            $query =(new Query('/system/scheduler/remove'))
           ->equal('.id', $monid);
        }
    }



    //luego necesito los parámetros que obtengo de el form
    $profile = new Profile;
    $uidSesion = session()->get('UserSession')->id;
    $profile->iduser_profile = $uidSesion;
    $profile->iduser_profile = $uidSesion;
    $profile->name_profile = $name;
    $profile->addpool_profile = $addrpool;
    $profile->cost_profile = "$". number_format($getprice);
    $profile->sprice_profile ="$". number_format($getsprice);
    $profile->sharedu_profile = $sharedusers;
    $profile->ratelimit_profile = $ratelimit;
    $profile->expmode_profile = $expmode;
    $profile->validation_profile = $validity;
    $profile->gracep_profile = $graceperiod;
    $profile->typet_profile = $typetime;
    $profile->limittime_profiles = $limittime;
    if($request->input('typet_profile') == "Corrido"){
        $profile->expiretime_profile = '0';
    }else if($request->input('typet_profile') == "Pausado"){
        $profile->expiretime_profiles = $expiretime;
    }
    $profile->cuttime_profile = $cuttime;
    $profile->lockuser_profile = $getlock;
    $profile->parentq_profiles = $parent; 
    $profile->save();
       





    }
}