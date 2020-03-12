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
        $config = new \RouterOS\Config([
            'host' => '20.20.10.1',
            'user' => 'admin',
            'pass' => '',
            'port' => 8728,
        ]);
        
        $client = new Client($config);
        $query =(new Query('/system/routerboard/print'));
        $out = $client->query($query)->read();
       
        dd($out);
        
        
        
        
        
        
        
        
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