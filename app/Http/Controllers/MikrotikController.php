<?php
namespace App\Http\Controllers; 
use \RouterOS\Client;

use Illuminate\Http\Request; 
use vendor\autoload;
use \RouterOS\Query;

    
class MikrotikController extends Controller{    
        
    public function conection(){
            $config = new \RouterOS\Config([
            'host' => '20.20.10.1',
            'user' => 'admin',
            'pass' => '',
            'port' => 8728,
        ]);
        
       
        // Initiate client with config object
        $client = new Client($config);

        /*
        * For the first we need to create new one user
        */

        // Build query
        $query =(new Query('/system/resource/print'));

        // Add user
        $out = $client->query($query)->read();
        print_r(json_encode($out));
       

    } 
}