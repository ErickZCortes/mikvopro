<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use App\User;
use App\Profile;
use App\DetailVoucher;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
class VouchersController extends Controller
{
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
            $uidSesion = session()->get('UserSession')->id;
            $profiles = Profile::where('iduser_profile', $uidSesion)->get();
            $user = User::find($uidSesion);
            return view('mikvo.dashboard.modules.vouchers.createvouchers', ['profiles'=>$profiles, "user"=>$user]);
        }
        return view('welcome');
    }
 
    public function store(Request $request){
        if (session()->has('UserSession')){
            $voucher = new Voucher;

            $uidSesion = session()->get('UserSession')->id;
            $voucher->iduser_voucher = $uidSesion;
            $voucher->dnsname_voucher = $request->input('dnsname_voucher');
            $voucher->nusers_voucher = $request->input('nusers_voucher');
            $voucher->server_voucher = $request->input('server_voucher');
            $voucher->prefix_voucher = $request->input('prefix_voucher');
            $profile = DB::table('profiles')->select('*')->where('name_profile',$request->input('nprofile_voucher'))->first();
            $voucher->idprofile_voucher = $profile->id;
            $voucher->nprofile_voucher = $request->input('nprofile_voucher');

            if($voucher->save()){
                $generation = $request->input('tipo_generar');
                $longuser = $request->input('long_user');
                $longpass = $request->input('long_pass');
                if($generation == 'uppercase'){
                    for($i = 0; $i < $voucher->nusers_voucher; $i++){
                        $keypass = '';
                        $keyuser = '';
                        $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $max = strlen($pattern)-1;
                        $detailv = new DetailVoucher;
                        $detailv->idvoucher_detailv =$voucher->id;
                        $detailv->server_detailv = $voucher->server_voucher;
                        
                        for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                            mt_rand(0,$max)
                        };
                        for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                            mt_rand(0,$max)
                        };
                        $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                        $detailv->password_detailv = $keypass;   
                        $detailv->limittda_detailv = $profile->limitda_profiles;
                        $detailv->limitho_detailv = $profile->limitho_profiles;
                        $detailv->save();
                    }
                }else if($generation == "lowercase"){
                    for($i = 0; $i < $voucher->nusers_voucher; $i++){
                        $keypass = '';
                        $keyuser = '';
                        $pattern = 'abcdefghijklmnopqrstuvwxyz';
                        $max = strlen($pattern)-1;
                        $detailv = new DetailVoucher;
                        $detailv->server_detailv = $voucher->server_voucher;
                        
                        for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                            mt_rand(0,$max)
                        };
                        for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                            mt_rand(0,$max)
                        };
                        $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                        $detailv->idvoucher_detailv =$voucher->id;
                        $detailv->password_detailv = $keypass;   
                        $detailv->limittda_detailv = $profile->limitda_profiles;
                        $detailv->limitho_detailv = $profile->limitho_profiles;
                        $detailv->save();
                    }
                }else if($generation == "numbers"){
                    for($i = 0; $i < $voucher->nusers_voucher; $i++){
                        $keypass = '';
                        $keyuser = '';
                        $pattern = '0123456789';
                        $max = strlen($pattern)-1;
                        $detailv = new DetailVoucher;
                        $detailv->idvoucher_detailv =$voucher->id;
                        $detailv->server_detailv = $voucher->server_voucher;
                        
                        for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                            mt_rand(0,$max)
                        };
                        for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                            mt_rand(0,$max)
                        };
                        $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                        $detailv->password_detailv = $keypass;   
                        $detailv->limittda_detailv = $profile->limitda_profiles;
                        $detailv->limitho_detailv = $profile->limitho_profiles;
                        $detailv->save();
                    }
                }else if($generation == "letnumlow"){
                    for($i = 0; $i < $voucher->nusers_voucher; $i++){
                        $keypass = '';
                        $keyuser = '';
                        $pattern = '0123456789abcdefghijklmnopqrstuvwxyz';
                        $max = strlen($pattern)-1;
                        $detailv = new DetailVoucher;
                        $detailv->idvoucher_detailv =$voucher->id;
                        $detailv->server_detailv = $voucher->server_voucher;
                        
                        for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                            mt_rand(0,$max)
                        };
                        for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                            mt_rand(0,$max)
                        };
                        $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                        $detailv->password_detailv = $keypass;   
                        $detailv->limittda_detailv = $profile->limitda_profiles;
                        $detailv->limitho_detailv = $profile->limitho_profiles;
                        $detailv->save();
                    }
                }else if($generation == "letnumupp"){
                    for($i = 0; $i < $voucher->nusers_voucher; $i++){
                        $keypass = '';
                        $keyuser = '';
                        $pattern = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $max = strlen($pattern)-1;
                        $detailv = new DetailVoucher;
                        $detailv->idvoucher_detailv =$voucher->id;
                        $detailv->server_detailv = $voucher->server_voucher;
                        
                        for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                            mt_rand(0,$max)
                        };
                        for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                            mt_rand(0,$max)
                        };
                        $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                        $detailv->password_detailv = $keypass;   
                        $detailv->limittda_detailv = $profile->limitda_profiles;
                        $detailv->limitho_detailv = $profile->limitho_profiles;
                        $detailv->save();
                    }
                }else if($generation == "all"){
                    for($i = 0; $i < $voucher->nusers_voucher; $i++){
                        $keypass = '';
                        $keyuser = '';
                        $pattern = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $max = strlen($pattern)-1;
                        $detailv = new DetailVoucher;
                        $detailv->idvoucher_detailv =$voucher->id;
                        $detailv->server_detailv = $voucher->server_voucher;
                        
                        for($h=0;$h < $longuser;$h++) $keyuser .= $pattern{
                            mt_rand(0,$max)
                        };
                        for($j=0;$j < $longpass;$j++) $keypass .= $pattern{
                            mt_rand(0,$max)
                        };
                        $detailv->user_detailv = $voucher->prefix_voucher.$keyuser;
                        $detailv->password_detailv = $keypass;   
                        $detailv->limittda_detailv = $profile->limitda_profiles;
                        $detailv->limitho_detailv = $profile->limitho_profiles;
                        $detailv->save();
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
        
        return view('mikvo.dashboard.modules.vouchers.designvoucher',["voucher"=>$voucher,"detailv"=>$detailv, "user"=>$user]);
        }
        return view('welcome');
    }
    
    public function exportPdf($id){
        if (session()->has('UserSession')){
        $voucher = DB::table('vouchers')->select('*')->where('id',$id)->first();
        $detailv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$voucher->id)->get();
       
        $pdf = PDF::loadView('mikvo.dashboard.modules.vouchers.pdf.pdfvoucher',["voucher"=>$voucher,"detailv"=>$detailv]);
            if($voucher->prefix_voucher == 'tete'){
                $pdfname =$voucher->prefix_voucher.$voucher->id.".pdf";
            }
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
}