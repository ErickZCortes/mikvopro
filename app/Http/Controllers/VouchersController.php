<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use App\User;

class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addVoucher(Request $request)
    {
        $voucher = new Voucher; 
        
        if (session()->has('UserSession')){
            $uidSesion = session()->get('UserSession')->id;
            //$dato = User::find($uidSesion);

            // Recibo todos los datos del formulario de la vista 'crear.blade.php'
            $voucher->iduser_voucher = $uidSesion;
            $voucher->dnsname_voucher = $request->input('dnsname_voucher');
            $voucher->nusers_voucher = $request->input('nusers_voucher');
            $voucher->server_voucher = $request->input('server_voucher');
            $voucher->prefix_voucher = $request->input('prefix_voucher');
            $voucher->idprofile_voucher = $request->input('idprofile_voucher');
            $voucher->nprofile_voucher = $request->input('nprofile_voucher');   
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
