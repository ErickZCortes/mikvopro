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
    <table class="table"> @foreach($detailv->chunk(4) as $detail)  
        <tr> @foreach($detail as $detaili)
            <td>
            <table class="inside" style="width: 180px;">
                <tbody>
                <tr>
                    <td style="font-weight: bold; text-align:left;">
                        <img style="margin:0px 0 0 3px;" width="60" height="25" src="{{ base_path() }}/public/uploads/descarga.jpg" alt="logo">
                    </td>
                    <td rowspan="3">
                        <img style="width: 50px; height: 50px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!} ">
                    </td>          
                </tr>
                <tr>
                    <td style="font-size: 10px; background-color: #00B4DB; color: white; text-align: center;">1 Mes</td>
                </tr>
                <tr>
                    <td style="width: 100%; font-weight: bold; font-size: 10px; text-align: left;"> Usuario: {{$detaili->user_detailv}}<br>Contraseña: {{$detaili->password_detailv}}</td>
                </tr>
                <tr>
                    <td style="font-size: 9px;"> 1 hora | tiempo corrido | 3MB</td>
                </tr>
                <tr>
                    <td style="font-size: 9px; ">Login: http://dnsname</td>
                    <td style="text-align:right; font-size: 10px;">[1]</td>
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
