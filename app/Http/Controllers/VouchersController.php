<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use App\User;
use DB;
class VouchersController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        //$voucher = DB::table('users')->where('name', 'John')->first()
        return view('mikvo.dashboard.modules.vouchers.indexvoucher', compact('vouchers'));
    }

    public function create()
    {
        $voucher = new Voucher;
        if (session()->has('UserSession')){
            
            $vouchers = DB::table('vouchers')->where('created_at')->Orderby('id', 'desc')->limit(1)->get();
            dd($vouchers);
            $uidSesion = session()->get('UserSession')->id;
            $voucher->iduser_voucher = $uidSesion;
            $voucher->idprofile_voucher = $request->input('idprofile_voucher'); 
        }

        $voucher->save();
        return view('mikvo.dashboard.modules.vouchers.createvouchers');
    }

    public function addVoucher(Request $request)
    {
        $voucher = new Voucher; 
        
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            //$dato = User::find($uidSesion);

            // Recibo todos los datos del formulario de la vista 'crear.blade.php'
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
        //
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
