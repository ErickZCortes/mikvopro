<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use App\User;
use App\Profile;
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
        $voucher = new Voucher;
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $voucher->iduser_voucher = $uidSesion;
            $profiledefault = DB::table('profiles')->select('id')->orderBy('id', 'desc')->limit(1)->first();
            $voucher->idprofile_voucher = $profiledefault->id; 
        }
        $voucher->save();

        $profiles = Profile::all();
        return view('mikvo.dashboard.modules.vouchers.createvouchers', compact('profiles'));
    }

    public function addVoucher(Request $request)
    {
        $voucher = new Voucher; 
        
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            $voucher->iduser_voucher = $uidSesion; 
            $voucher->idprofile_voucher = $request->input('idprofile_voucher'); 
        }

        $voucher->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ////$vouchers = DB::table('vouchers')->select('id')->orderBy('id', 'desc')->limit(1)->first();
            //SELECT id from vouchers where created_at order by id desc limit 1
           // dd($vouchers);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
