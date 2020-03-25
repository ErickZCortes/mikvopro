<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use App\User;
use App\Profile;
use App\DetailVoucher;
use App\Template;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use vendor\autoload;
use \RouterOS\Query;
use \RouterOS\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Paginate;
use RealRashid\SweetAlert\Facades\Alert;


class VouchersController extends Controller
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
            return view('mikvo.dashboard.modules.vouchers.indexvoucher', ['voucher'=>$voucher]);
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
                    //$profiles = Profile::where('iduser_profile', $uidSesion)->get();
                    $client = $this->connect($ip, $userrouter, $pass, $port);
           
                    $gethpdns = (new Query('/ip/hotspot/profile/print'));
                    $getalldns = $client->query($gethpdns)->read();

                    $getservers = (new Query('/ip/hotspot/print'));        
                    $getallservers = $client->query($getservers)->read();

                    $getprofiles = (new Query('/ip/hotspot/user/profile/print'));        
                    $profiles = $client->query($getprofiles)->read();
                    
                    return view('mikvo.dashboard.modules.vouchers.createvouchers', ['profiles'=>$profiles, "user"=>$user, "alldns"=>$getalldns, "allservers"=>$getallservers]);
                }
            }
        }
        return view('welcome');
    }
 
    public function store(Request $request){

        if (session()->has('UserSession')){
            if(session()->has('routerConnected')){
                $ip = session()->get('routerConnected')->ip_router;
                $userrouter = session()->get('routerConnected')->user_router;
                $pass = session()->get('routerConnected')->password_router;
                $port = session()->get('routerConnected')->port_router;
                if($this->connect($ip, $userrouter, $pass, $port)){
                    $voucher = new Voucher;
                    $client = $this->connect($ip, $userrouter, $pass, $port);
                    $uidSesion = session()->get('UserSession')->id;

                    $dns = $request->input('dnsname_voucher');
                    $numusers = $request->input('nusers_voucher');
                    $server = $request->input('server_voucher');
                    $prefix = $request->input('prefix_voucher');
                    $profilename = $request->input('nprofile_voucher');

                    $voucher->iduser_voucher = $uidSesion;
                    $voucher->dnsname_voucher = $dns;
                    $voucher->nusers_voucher = $numusers;
                    $voucher->server_voucher = $server;
                    $voucher->prefix_voucher = $prefix;  
                    $usermik = '';     
                    $priceprofile ="";             
                    $bdprofile = Profile::where('name_profile', $profilename)->first();
                    $query =(new Query('/ip/hotspot/user/profile/print'))
                    ->where('name', $profilename);
                    $mikprofile = $client->query($query)->read();
                    $plimittime = $mikprofile[0]['session-timeout'];
                    
                    $voucher->idprofile_voucher = $bdprofile->id;
                    $voucher->nprofile_voucher = $bdprofile->name_profile;

                    $profile = DB::table('profiles')->select('*')->where('name_profile',$profilename)->first();
                    
                    if($voucher->save()){
                        $generation = $request->input('tipo_generar');
                        $longuser = $request->input('long_user');
                        $longpass = $request->input('long_pass');
                        $priceprofile = $bdprofile->sprice_profile;
                        if($generation == 'uppercase'){
                            for($i = 0; $i < $voucher->nusers_voucher; $i++){
                                $detailv = new DetailVoucher;
                                $detailv->idvoucher_detailv =$voucher->id;
                                $detailv->server_detailv = $voucher->server_voucher;
        
                                $keypass = '';
                                $keyuser = '';
                                $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $max = strlen($pattern)-1;
                                
                                for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                                    mt_rand(0,$max)
                                };
                                for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                                    mt_rand(0,$max)
                                };

                                $usermik = $voucher->prefix_voucher.$keyuser;

                                $query =(new Query('/ip/hotspot/user/add'))
                                ->equal('server', $server)
                                ->equal('name', $usermik)
                                ->equal('password', $keypass)
                                ->equal('profile', $profilename)
                                ->equal('limit-uptime', $plimittime);
                                $out = $client->query($query)->read();
                                
        
                                $detailv->user_detailv = $usermik;
                                $detailv->password_detailv = $keypass;   
                                $detailv->limittda_detailv = $profile->limitda_profiles;
                                $detailv->limitho_detailv = $profile->limitho_profiles;
                                $detailv->price_detailv = $priceprofile;
                                $detailv->save();
                            }
                        }else if($generation == "lowercase"){
                            for($i = 0; $i < $voucher->nusers_voucher; $i++){
                                $detailv = new DetailVoucher;
                                $detailv->server_detailv = $voucher->server_voucher;
                                $detailv->idvoucher_detailv =$voucher->id;
                                $keypass = '';
                                $keyuser = '';
                                $pattern = 'abcdefghijklmnopqrstuvwxyz';
                                $max = strlen($pattern)-1;
                               
                                for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                                    mt_rand(0,$max)
                                };
                                for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                                    mt_rand(0,$max)
                                };
        
                                $usermik = $voucher->prefix_voucher.$keyuser;

                                $query =(new Query('/ip/hotspot/user/add'))
                                ->equal('server', $server)
                                ->equal('name', $usermik)
                                ->equal('password', $keypass)
                                ->equal('profile', $profilename)
                                ->equal('limit-uptime', $plimittime);
                                $out = $client->query($query)->read();
                                

                                $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                                $detailv->password_detailv = $keypass;   
                                $detailv->limittda_detailv = $profile->limitda_profiles;
                                $detailv->limitho_detailv = $profile->limitho_profiles;
                                $detailv->price_detailv = $priceprofile;
                                $detailv->save();
                            }
                        }else if($generation == "numbers"){
                            for($i = 0; $i < $voucher->nusers_voucher; $i++){
                                $detailv = new DetailVoucher;
                                $detailv->idvoucher_detailv =$voucher->id;
                                $detailv->server_detailv = $voucher->server_voucher;
                                $keypass = '';
                                $keyuser = '';
                                $pattern = '0123456789';
                                $max = strlen($pattern)-1;
                                
                                for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                                    mt_rand(0,$max)
                                };
                                for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                                    mt_rand(0,$max)
                                };

                                $usermik = $voucher->prefix_voucher.$keyuser;
        
                                $query =(new Query('/ip/hotspot/user/add'))
                                ->equal('server', $server)
                                ->equal('name', $usermik)
                                ->equal('password', $keypass)
                                ->equal('profile', $profilename)
                                ->equal('limit-uptime', $plimittime);
                                $out = $client->query($query)->read();
                               

                                $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                                $detailv->password_detailv = $keypass;   
                                $detailv->limittda_detailv = $profile->limitda_profiles;
                                $detailv->limitho_detailv = $profile->limitho_profiles;
                                $detailv->price_detailv = $priceprofile;
                                $detailv->save();
                            }
                        }else if($generation == "letnumlow"){
                            for($i = 0; $i < $voucher->nusers_voucher; $i++){
                                $detailv = new DetailVoucher;
                                $detailv->idvoucher_detailv =$voucher->id;
                                $detailv->server_detailv = $voucher->server_voucher;
                                $keypass = '';
                                $keyuser = '';
                                $pattern = '0123456789abcdefghijklmnopqrstuvwxyz';
                                $max = strlen($pattern)-1;
                                
                                for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                                    mt_rand(0,$max)
                                };
                                for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                                    mt_rand(0,$max)
                                };

                                $usermik = $voucher->prefix_voucher.$keyuser;
        
                                $query =(new Query('/ip/hotspot/user/add'))
                                ->equal('server', $server)
                                ->equal('name', $usermik)
                                ->equal('password', $keypass)
                                ->equal('profile', $profilename)
                                ->equal('limit-uptime', $plimittime);
                                $out = $client->query($query)->read();
                                

                                $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                                $detailv->password_detailv = $keypass;   
                                $detailv->limittda_detailv = $profile->limitda_profiles;
                                $detailv->limitho_detailv = $profile->limitho_profiles;
                                $detailv->price_detailv = $priceprofile;
                                $detailv->save();
                            }
                        }else if($generation == "letnumupp"){
                            for($i = 0; $i < $voucher->nusers_voucher; $i++){
                                $detailv = new DetailVoucher;
                                $detailv->idvoucher_detailv =$voucher->id;
                                $detailv->server_detailv = $voucher->server_voucher;
                                $keypass = '';
                                $keyuser = '';
                                $pattern = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $max = strlen($pattern)-1;
                                
                                for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                                    mt_rand(0,$max)
                                };
                                for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                                    mt_rand(0,$max)
                                };

                                $usermik = $voucher->prefix_voucher.$keyuser;

                                $query =(new Query('/ip/hotspot/user/add'))
                                ->equal('server', $server)
                                ->equal('name', $usermik)
                                ->equal('password', $keypass)
                                ->equal('profile', $profilename)
                                ->equal('limit-uptime', $plimittime);
                                $out = $client->query($query)->read();
                                
        
                                $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                                $detailv->password_detailv = $keypass;   
                                $detailv->limittda_detailv = $profile->limitda_profiles;
                                $detailv->limitho_detailv = $profile->limitho_profiles;
                                $detailv->price_detailv = $priceprofile;
                                $detailv->save();
                            }
                        }else if($generation == "all"){
                            for($i = 0; $i < $voucher->nusers_voucher; $i++){
                                $detailv = new DetailVoucher;
                                $detailv->idvoucher_detailv =$voucher->id;
                                $detailv->server_detailv = $voucher->server_voucher;
                                $keypass = '';
                                $keyuser = '';
                                $pattern = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $max = strlen($pattern)-1;
                                
                                for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                                    mt_rand(0,$max)
                                };
                                for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                                    mt_rand(0,$max)
                                };

                                $usermik = $voucher->prefix_voucher.$keyuser;

                                $query =(new Query('/ip/hotspot/user/add'))
                                ->equal('server', $server)
                                ->equal('name', $usermik)
                                ->equal('password', $keypass)
                                ->equal('profile', $profilename)
                                ->equal('limit-uptime', $plimittime);
                                $out = $client->query($query)->read();
                                
        
                                $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                                $detailv->password_detailv = $keypass;   
                                $detailv->limittda_detailv = $profile->limitda_profiles;
                                $detailv->limitho_detailv = $profile->limitho_profiles;
                                $detailv->price_detailv = $priceprofile;
                                $detailv->save();
                            }
                        }
                        
                    }
                }
            }
            $detailsv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$voucher->id)->get();
            $voucherget = DB::table('vouchers')->select('*')->where('id',$voucher->id)->first(); 
            $user = User::find($uidSesion);

            return view('mikvo.dashboard.modules.vouchers.indexvoucher',["detailsv"=>$detailsv,"voucherget"=>$voucherget, 'user'=>$user]);   
        }
        return view('welcome');
    }
    
    public function update(Request $request, $id)
    {
           if (session()->has('UserSession')){
            $voucher = Voucher::find($id);

            $voucher->dnsname_voucher = $request->input('dnsname_voucher');
            $voucher->nusers_voucher = $request->input('nusers_voucher');
            $voucher->server_voucher = $request->input('server_voucher');
            $voucher->prefix_voucher = $request->input('prefix_voucher');
            $voucher->nprofile_voucher = $request->input('nprofile_voucher'); 
            
            $voucher->save();
            
            return redirect('/dashboard/vouchers')->with('message','Guardado Satisfactoriamente !');   
        }
        return view('welcome');
    }

    public function destroy($id){
        if(session()->has('UserSession')){
            $detailsv = DetailVoucher::where('idvoucher_detailv', $id);
            if($detailsv->delete()){
             Voucher::destroy($id);
            }
            Alert::success('Vouchers eliminados')->autoClose(3000);
             return redirect('/dashboard/vouchers/reprint');
         }
         return view('welcome');
    }
    
    public function design($id)
    {
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $voucher = DB::table('vouchers')->select('*')->where('id',$id)->first();
            $detailv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$id)->get();
            $profile = Profile::find($voucher->idprofile_voucher);
            $templates = DB::table('templates_voucher')->select('*')->where('iduser_template',$uidSesion)->get();
        return view('mikvo.dashboard.modules.vouchers.designvoucher',["voucher"=>$voucher,"detailv"=>$detailv, "user"=>$user, "profile"=>$profile,"templates"=>$templates]);
        }
        return view('welcome');
    }
    
    public function exportPdf(Request $request,$id){
        if (session()->has('UserSession')){
        $voucher = DB::table('vouchers')->select('*')->where('id',$id)->first();
        $detailv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$voucher->id)->get();
       
        $plantilla = $request->input('template');
        $type = $request->input('type_template');
        $amount = $request->input('amount_template');
        $template = Template::find($plantilla);   
        $profile = Profile::find($voucher->idprofile_voucher);   
        $pdf="";
        $pdfname ="";
        
        if($type == "hoja"){
            if($amount == "papervu"){
                $pdf = PDF::loadView('mikvo.dashboard.modules.vouchers.pdf.pdfvoucher',["voucher"=>$voucher,"detailv"=>$detailv, "template"=>$template,"profile"=>$profile]);
                
            }else{
                $pdf = PDF::loadView('mikvo.dashboard.modules.vouchers.pdf.pdfvoucher32',["voucher"=>$voucher,"detailv"=>$detailv, "template"=>$template,"profile"=>$profile]);
  
            }
        }else if($type == "qr"){
            if($amount == "papervu"){
                $pdf = PDF::loadView('mikvo.dashboard.modules.vouchers.pdf.pdfvoucherqr',["voucher"=>$voucher,"detailv"=>$detailv,"template"=>$template,"profile"=>$profile]);
           
            }else{
                $pdf = PDF::loadView('mikvo.dashboard.modules.vouchers.pdf.pdfvouqr32',["voucher"=>$voucher,"detailv"=>$detailv,"template"=>$template,"profile"=>$profile]);
          
            }
        }else{
            if($amount == "papervu"){
                $pdf = PDF::loadView('mikvo.dashboard.modules.vouchers.pdf.pdfvoucherimg',["voucher"=>$voucher,"detailv"=>$detailv, "template"=>$template,"profile"=>$profile]);
     
            }else{
                $pdf = PDF::loadView('mikvo.dashboard.modules.vouchers.pdf.pdfvouimg32',["voucher"=>$voucher,"detailv"=>$detailv, "template"=>$template,"profile"=>$profile]);
          
            }
        }
        $pdfname =$voucher->prefix_voucher.$voucher->nprofile_voucher.$voucher->created_at.".pdf";
        return$pdf->stream($pdfname);
        return $pdf->download($pdfname);
        }   
        return view('welcome');         
    }
//---------------------------------------REPRINT VOUCHER----------------------------------------------//
    public function indexreprint(){
        if(session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $vouchers = Voucher::where('iduser_voucher', $uidSesion)->paginate(10);
            return view('mikvo.dashboard.modules.vouchers.reprintvoucher', ['user'=>$user, 'vouchers'=>$vouchers]);
        }
        return view('welcome');
    }

    public function reprintvoucher($id){
        if(session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $voucherget = DB::table('vouchers')->select('*')->where('id',$id)->first();
            //dd($voucherget);
            $detailsv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$id)->get();

            return view('mikvo.dashboard.modules.vouchers.indexvoucher',["detailsv"=>$detailsv,"voucherget"=>$voucherget, 'user'=>$user]);
        }
        return view('welcome');
    }

    public function searchvouchers(Request $request){
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $search = $request->get('search');
            $vouchers = DB::table('vouchers')->where('prefix_voucher', 'like', '%'.$search.'%')->paginate(10);
            return view('mikvo.dashboard.modules.vouchers.reprintvoucher', ["user"=>$user, "vouchers"=>$vouchers]);
        }
        return view('welcome');
    }

    //---------------------------------------CREATE TEMPLATE----------------------------------------------//

    public function indextemplate($id){
        if(session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $voucher = DB::table('vouchers')->select('*')->where('id',$id)->first();
            $detailv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$id)->get();
            $profile = Profile::find($voucher->idprofile_voucher);
            $templates = DB::table('templates_voucher')->select('*')->where('iduser_template',$uidSesion)->get();
            return view('mikvo.dashboard.modules.vouchers.pdf.voucher', ["voucher"=>$voucher,"detailv"=>$detailv, "user"=>$user, "profile"=>$profile,"templates"=>$templates]);
        }
        return view('welcome');

    }
    public function createmp(Request $request, $id){
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $user = User::find($uidSesion);
            $voucher = DB::table('vouchers')->select('*')->where('id',$id)->first();
            $detailv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$id)->get();
            $profile = Profile::find($voucher->idprofile_voucher);
          
            $nametemplate = $request->input('name_template');
            $templatedb = DB::table('templates_voucher')->select('name_template')->where('name_template',$nametemplate)->where('iduser_template',$uidSesion)->first();
            if($templatedb == null){
                $template = new Template;
                $template->iduser_template = $user->id;
                $template->name_template = $request->input('name_template');
                $template->bgcolor_template = $request->input('bgcolor_template');
                $template->logo_template = $request->input('logo_template');
                $template->logo_template = $request->file('logo_template')->store('/');
                $template->font_template = $request->input('font_template'); 
                $template->color_template = $request->input('color_etiqueta');
            
                $template->save();
               
                $templates = DB::table('templates_voucher')->select('*')->where('iduser_template',$uidSesion)->get();

            return view('mikvo.dashboard.modules.vouchers.designvoucher',["voucher"=>$voucher,"detailv"=>$detailv, "user"=>$user, "profile"=>$profile, "templates"=>$templates]);
            }else{
                Alert::error('Este template ya existe')->autoClose(2000);
                return redirect()->route('/dashboard/vouchers/reprintvoucher', ['id' => $voucher->id]);
            }
            
        }
        return view ('welcome');
    }
}