<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailVoucher;
use App\Voucher;

class DetailvController extends Controller
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
    public function addDetail(Request $request)
    {
        $detail = new DetailVoucher; 
        
        if (session()->has('UserSession')){
            //$uidSesion = session()->get('UserSession')->id;
            $idVoucher = Voucher::find()->id;

            // Recibo todos los datos del formulario de la vista 'crear.blade.php'
            $detail->idvoucher_detailv = $idVoucher;
            $detail->server_detailv = $request->input('server_detailv');
            $detail->user_detailv = $request->input('user_detailv');
            $detail->password_detailv = $request->input('password_detailv');
            $detail->limittime_detailv = $request->input('limittime_detailv');
            $detail->limitbin_detailv = $request->input('limitbin_detailv');
            $detail->limitout_detailv = $request->input('limitout_detailv');   
        }

        $detail->save();
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
