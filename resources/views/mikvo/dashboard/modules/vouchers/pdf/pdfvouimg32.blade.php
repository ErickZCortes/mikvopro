<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
@page { 
  size: 595pt 570pt; 
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

</style>
</head>
<div class="principal">
    <table class="table"> @foreach($detailv->chunk(4) as $detail)  
        <tr> @foreach($detail as $detaili)
            <td>
            <table class="inside"  style="background-color: {{$template->bgcolor_template}};" >
                <tbody>
              
                    <tr>
                    <td rowspan="4">
                        <img style=" margin:0px 0 0 3px;" width="50" height="28" src="{{ base_path() }}/public/uploads/{{$template->logo_template}}" alt="logo">
                    </td>          
                </tr>
                <tr>
                    <td style="font-size: 10px; font-family:{{$template->font_template}}; background-color: {{$template->color_voucher}}; color: white; text-align: center;">{{$voucher->nprofile_voucher}}</td>
                </tr>
                <tr>
                <td style="width: 100%; font-family:{{$template->font_template}}; font-size: 10px; text-align: center;"> Usuario: {{$detaili->user_detailv}}<br>Contraseña: {{$detaili->password_detailv}} <br> ${{$profile->sprice_profile}} pesos</td>
                </tr>
                <tr>
                    <td style="font-size: 9px; font-family:{{$template->font_template}}; ">Login: http://{{$voucher->dnsname_voucher}}</td>
                    <td style="font-size: 8px; font-family:{{$template->font_template}};">[{{$detaili->id}}]</td>
                    
                </tr>
                </tbody>
            </table>
            </td>
            @endforeach
        </tr>
        @endforeach
    </table>	    
</div>  
</html>