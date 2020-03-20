<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
    @page { 
      size: 595pt 840pt; 
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
                <table class="inside" style="background-color: {{$template->bgcolor_template}};">
                    <tbody>
                        <tr>
                            <td style="color:black;" valign="top">
                            <table style="width:100%;">
                            <tbody>
                      <tr>
                            <td style="width:60px">
                                <img width="60" height="20" src="{{ base_path() }}/public/uploads/descarga.jpg" alt="logo">
                            </td>	
                            <td>
                      <!--NUM-->
                      <div style="float:right;margin-top:-6px; margin-right:-6px;width:5%;text-align:right;font-size:9px; font-family:{{$template->font_template}};">
                      [{{$detaili->id}}]
                      </div>	
                      <!--HARGA-->
                      <div style="text-align:center;font-size:14px;padding-left:17px; padding-top:17px;">
                      <small style="font-size:12px; font-family:{{$template->font_template}};margin-left:-60px;">{{$voucher->nprofile_voucher}}</small>
                      </div>	
                      <!--HARGA-->	  
                        </td>		
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="border-collapse: collapse;">
                  <table style="width:100%;border-collapse: collapse;">
                    <tbody>
                      <tr>
                        <td style="width:95px" valign="top">
                      <!--USER-->
                      <div style="clear:both;color:#111;margin-top:2.5px;margin-bottom:2.5px;">

                        <div style="text-align:center;font-family:{{$template->font_template}};font-size:10px;">Usuario:</div>
                        <div style="border:1px solid black; background-color: white; text-align:center;font-family:{{$template->font_template}};font-size:10px;">{{$detaili->user_detailv}}</div>
                    
                        <div style="text-align:center;font-family:{{$template->font_template}};font-size:10px;">Contraseña:</div>
                        <div style="border:1px solid black; background-color: white; text-align:center;font-family:{{$template->font_template}};font-size:10px;">{{$detaili->password_detailv}}</div>
                      
                      </div>
                      <!--USER--> 
                      <!--URL-->
                      <div style="text-align:center; font-size:10px; font-family:{{$template->font_template}};">
                        ${{$profile->sprice_profile}} pesos
                        
                      </div>
                      <!--URL-->	  
                        </td>	
                        <td style="width:100px;text-align:center;">
                    
                      <!--QRCODE-->
                      
                      <div style="text-align:center;">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('http://'.$voucher->dnsname_voucher.'/login?username='.$detaili->user_detailv.'&password='.$detaili->password_detailv.'')) !!} "></div>
                      <!--QRCODE--> 
                        </td>		
                      </tr>
              <tr>
                <td style="background:{{$template->color_template}};padding:0px;" valign="top" colspan="2">                
                      <!--URL-->
                      <div style="text-align:center;color:#fff;font-size:9px;font-family:{{$template->font_template}};margin:0px;padding:2.5px;">
                        Login: https://{{$voucher->dnsname_voucher}} 
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