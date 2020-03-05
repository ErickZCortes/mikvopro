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
        return view('mikvo.dashboard.modules.vouchers.indexvoucher');
    }

    public function create()
    {
        $profiles = Profile::all();
        
        return view('mikvo.dashboard.modules.vouchers.createvouchers', compact('profiles'));
    }
 
    public function store(Request $request){
        $voucher = new Voucher;
        if (session()->has('UserSession')){
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

        }
        $detailsv = DB::table('detail_voucher')->select('*')->where('idvoucher_detailv',$voucher->id)->get();
        $voucherget = DB::table('vouchers')->select('*')->where('id',$voucher->id)->get();
        
        ($voucherget);
        //$voucherget = Voucher::find($voucher->id);
        //,['detailsv'=>$detailsv],['voucherget'=>$voucherget]
        
        return view('mikvo.dashboard.modules.vouchers.indexvoucher',["detailsv"=>$detailsv,"voucherget"=>$voucherget]);
    }
    
   public function update(Request $request, $id)
    {
        //$vouchers = DB::table('vouchers')->select('id')->orderBy('id', 'desc')->limit(1)->first();
           $voucher = Voucher::find($id);
        
           if (session()->has('UserSession')){
            $voucher->dnsname_voucher = $request->input('dnsname_voucher');
            $voucher->nusers_voucher = $request->input('nusers_voucher');
            $voucher->server_voucher = $request->input('server_voucher');
            $voucher->prefix_voucher = $request->input('prefix_voucher');
            $voucher->nprofile_voucher = $request->input('nprofile_voucher'); 
           }
   
           $voucher->save();
           return redirect('/dashboard/vouchers')->with('message','Guardado Satisfactoriamente !');
    }

    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        Voucher::destroy($id);
        return redirect('/dashboard/vouchers');
    }
    
    public function design()
    {
        return view('mikvo.dashboard.modules.vouchers.designvoucher');
    }
    public function exportPdf($id){
        $voucher = Voucher::get();
        $pdf = PDF::loadView('pdf.vouchers',compact('vouchers'));
        return $pdf->download('voucher-list.pdf');
    }
}
