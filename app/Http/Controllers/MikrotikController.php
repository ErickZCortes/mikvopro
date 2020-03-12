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

        $getallqueue = (new Query('/queue/simple/print'));        
        $out = $client->query($getallqueue)->read();
        //print_r($out);
        
        $getpool = (new Query('/ip/pool/print'));
        $out = $client->query($getpool)->read();
        print_r($out);







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
        
       

    } 
}