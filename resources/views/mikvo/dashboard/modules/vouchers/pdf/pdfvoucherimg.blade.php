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
</style>
</head>
<div class="principal">
    <table class="table"> @foreach($detailv->chunk(3) as $detail)
        <tr> @foreach($detail as $detaili)
            <td>
                <table class="inside">
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{ base_path() }}/public/uploads/descarga.jpg" alt="logo" style="height:45px;">
                            </td>
                            <td style="text-align: right; font-size: 10px;" rowspan="1">
                                [{{$detaili->id}}]
                            </td>
                        </tr>
                        <tr>
                            <td style=" background:#FDC830; color:#fff;">
                                Valido: {{$voucher->nprofile_voucher}} datalimit
                            </td>
                            <td rowspan="3">
                                <img src="{{ base_path() }}/public/uploads/9.jpg" alt="logo" style="height:45px;">

                            </td>
                        </tr>
                        <tr>       
                            <td style="width: 100%; font-weight: bold; font-size: 12px; color:grey; text-align: left;">
                                Usuario: {{$detaili->user_detailv}}<br>Contraseña: {{$detaili->password_detailv}}
                            </td>
                            
                        </tr>
                        
                        <tr>
                            <td colspan="1" style="font-size: 10px;">
                                Login:http://{{$voucher->dnsname_voucher}} -  - Cs : 085366567572 
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