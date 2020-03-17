<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
    @page { 
      size: 595pt 800pt; 
      margin: 0.3cm 0.3cm;
      }
      @media print
    {
      .table { page-break-after:auto }
      tr    { page-break-inside:avoid; page-break-after:auto }
      td    { page-break-inside:avoid; page-break-after:auto }
      thead { display:table-header-group }
      tfoot { display:table-footer-group }
    }
    table.table{
        width: 100%;
    }
    table.inside{
        width: 100%;
      border: 1px solid black;
    }
    
    .principal{
      width: 100%;
    }
    .qrcode{
		height:60px;
		width:60px;
    }
   
    </style>
</head>
<div class="principal">
    <table class="table"> @foreach($detailv->chunk(3) as $detail)  
        <tr> @foreach($detail as $detaili)
            <td>
                <table class="inside">
                    <tbody>
                        <tr>
                            <td style="color:black;" valign="top">
                            <table style="width:100%;">
                            <tbody>
                      <tr>
                            <td style="width:75px">
                                <img style="margin:5px 0 0 5px;" width="70" height="25" src="{{ base_path() }}/public/uploads/descarga.jpg" alt="logo">
                            </td>	
                            <td style="width:115px">
                      <!--NUM-->
                      <div style="float:right;margin-top:-6px;margin-right:0px;width:5%;text-align:right;font-size:7px;">
                      [{{$detaili->id}}]
                      </div>	
                      <!--HARGA-->
                      <div style="text-align:center;font-weight:bold;font-family:Tahoma;font-size:18px;padding-left:17px; padding-top:17px;">
                      <small style="font-size:15px; margin-left:-57px;">Precio:$2000</small>
                      </div>	
                      <!--HARGA-->	  
                        </td>		
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="color:#666;border-collapse: collapse;" valign="top">
                  <table style="width:100%;border-collapse: collapse;">
                    <tbody>
                      <tr>
                        <td style="width:95px" valign="top">
                      <!--USER-->
                      <div style="clear:both;color:#111;margin-top:2.5px;margin-bottom:2.5px;">

                        <div style="padding:0px;text-align:center;font-weight:bold;font-size:10px;">Usuario</div>
                        <div style="padding:0px;border:1px solid #111; color:#666; text-align:center;font-weight:bold;font-size:12px;">{{$detaili->user_detailv}}</div>
                    
                        <div style="padding:0px;text-align:center;font-weight:bold;font-size:10px;">Contraseña</div>
                        <div style="padding:0px;border:1px solid #111; color:#666; text-align:center;font-weight:bold;font-size:12px;">{{$detaili->password_detailv}}</div>
                      
                      </div>
                      <!--USER--> 
                      <!--URL-->
                      <div style="text-align:left;color:#111;font-size:9px;font-weight:bold;margin:0px;padding:2.5px;">

                      Login: https://{{$voucher->dnsname_voucher}} 
                      </div>
                      <!--URL-->	  
                        </td>	
                        <td style="width:100px;text-align:center;">
                    
                      <!--QRCODE-->
                      <div style="text-align:center;margin:0 0px 0px 0;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!} "></div>
                      <!--QRCODE--> 
                        </td>		
                      </tr>
              <tr>
                <td style="background:#0082c8;padding:0px;" valign="top" colspan="2">
                
                      <!--URL-->
                      <div style="text-align:center;color:#fff;font-size:9px;font-weight:bold;margin:0px;padding:2.5px;">
                        valido: 1 MES
                      </div>
                      <!--URL-->	 
                      </td>
              </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
            </tbody>
            </table>
        </td>
        @endforeach
        </tr>
        @endforeach
    </table>      
</div>  
</html>