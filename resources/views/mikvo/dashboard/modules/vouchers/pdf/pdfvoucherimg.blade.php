<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
@page { 
  size: 595pt 700pt; 
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
    <table class="table"> @foreach($detailv->chunk(3) as $detail)
        <tr> @foreach($detail as $detaili)
            <td>
                <table class="inside" style="background-color: {{$template->bgcolor_template}};">
                    <tbody>
                        <tr>
                            <td>
                                <img height="25px" width="35px" src="{{ base_path() }}/public/uploads/descarga.jpg" alt="logo">
                            </td>
                            <td style="text-align: right; font-family:{{$template->font_template}}; font-size: 8px;" rowspan="1">
                                [{{$detaili->id}}]
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; background:{{$template->color_template}}; font-family:{{$template->font_template}}; color:#fff;">{{$voucher->nprofile_voucher}}
                            </td>
                            <td rowspan="3">
                            <img src="{{ base_path() }}/public/uploads/{{$template->logo_template}}" alt="logo" style="height:50px;">
                            </td>
                        </tr>
                        <tr>       
                            <td style="width: 100%; font-family:{{$template->font_template}}; font-size: 10px; text-align: center;">
                                ${{$profile->sprice_profile}} pesos <br>
                               <b> Usuario:</b> {{$detaili->user_detailv}}<br><b>Contraseña:</b> {{$detaili->password_detailv}} <br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 10px; font-family:{{$template->font_template}};">
                                login: http://{{$voucher->dnsname_voucher}}
                            </td>
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