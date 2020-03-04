<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use App\User;
use App\Profile;
use App\DetailVoucher;
use DB;
class VouchersController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('mikvo.dashboard.modules.vouchers.indexvoucher', compact('vouchers'));
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
            $idprofile = DB::table('profiles')->select('id')->where('name_profile',$request->input('nprofile_voucher'))->first();
            $voucher->idprofile_voucher = $idprofile->id;
            $voucher->nprofile_voucher = $request->input('nprofile_voucher');

            if($voucher->save()){
                
                for($i = 0; $i < $voucher->nusers_voucher; $i++){
                    $key = '';
                    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                    $max = strlen($pattern)-1;
                    $detailv = new DetailVoucher;
                    $detailv->idvoucher_detailv =$voucher->id;
                    for($h=0;$h < 4;$h++) $key .= $pattern{
                        mt_rand(0,$max)
                    };
                    $detailv->password_detailv = $key;   
                    $detailv->save();                   
                }
                
                
                
            }

        }
    
    }
    
   public function update(Request $request, $id)
    {
        //$vouchers = DB::table('vouchers')->select('id')->orderBy('id', 'desc')->limit(1)->first();
          // dd($vouchers);
           $voucher = Voucher::find($id);
        
           if (session()->has('UserSession')){
            $voucher->dnsname_voucher = $request->input('dnsname_voucher');
            $voucher->nusers_voucher = $request->input('nusers_voucher');
            $voucher->server_voucher = $request->input('server_voucher');
            $voucher->prefix_voucher = $request->input('prefix_voucher');
            //$voucher->idprofile_voucher = $request->input('idprofile_voucher');
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
}
