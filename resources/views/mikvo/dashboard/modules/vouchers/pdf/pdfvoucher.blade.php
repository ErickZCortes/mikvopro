<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
@page { 
  size: 595pt 820pt; 
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
        <td style="text-align: center; font-size: 14px;">
         <p>Voucher Hotspot</p>
         <td><img src="{{ base_path() }}/public/uploads/descarga.jpg" alt="logo" style="height:25px; text-align:center;"></td>
        </td>
      </tr>
      <tr>
        <td>
          <table style=" text-align: center; width: 210px; font-size: 12px;">
            <tbody>
              <tr>
                <td>
                  <table style="width:100%;">
                <tr>
                  <td style="text-align: center;">Usuario</td>
                  <td style="text-align: center;">Contraseña</td>
                </tr>
            <tr>
              <td style="border: 1px solid black;  text-align: center; font-weight:bold;">{{$detaili->user_detailv}}</td>
              <td style="border: 1px solid black; text-align: center; font-weight:bold;">{{$detaili->password_detailv}}</td>
            </tr>
          </table>
        </td>
      <tr>
        <td style="border-top: 1px solid black;font-weight:bold; font-size:16px; background-color:#108dc7; color: #ffffff">$10.00 pesos</td>
      </tr>
      <tr>
        <td style="font-weight:bold; font-size:12px">Login: http://mikvo.com</td>
      </tr>
    </tbody>
      </table>
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