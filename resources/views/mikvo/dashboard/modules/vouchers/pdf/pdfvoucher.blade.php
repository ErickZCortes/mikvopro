<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
@page { 
  size: 595pt 842pt; 
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
  padding:0px;
}
table.inside{
	width: 100%;
  border: 1px solid red;
}
.td{
  width: 33.33%;
border: 1px solid red;
}
.principal{
  width: 100%;
  border: 1px solod black;
}
</style>
</head>
<div class="principal">
    <table class="table">
    @foreach($detailv->chunk(3) as $detail)  
  <tr>
  @foreach($detail as $detaili)
    <td>
      <table class="inside">
  <tbody>
    <tr>
      <td style="text-align: left; font-size: 14px; font-weight:bold; border-bottom: 1px black solid;"><img src="https://wrmx00.epimg.net/radio/imagenes/2017/02/24/sociedad/1487970530_833241_1487978658_noticia_normal.jpg" alt="logo" style="height:30px;border:0;">a ver</span></td>
    </tr>
    <tr>
      <td>
    <table style=" text-align: center; width: 210px; font-size: 12px;">
  <tbody>
    <tr>
      <td>
        <table style="width:100%;">
        <tr>
          <td>Username</td>
        </tr>
        <tr>
          <td style="border: 1px solid black; font-weight:bold;">{{$detaili->user_detailv}}</td>
        </tr>
        <tr>
          <td>Password</td>
        </tr>
        <tr>
          <td style="border: 1px solid black; font-weight:bold;">{{$detaili->password_detailv}}</td>
        </tr>
        </table>
      </td>
    <tr>
      <td colspan="2" style="border-top: 1px solid black;font-weight:bold; font-size:16px">no c 10 pesos</td>
    </tr>
    <tr>
      <td colspan="2" style="font-weight:bold; font-size:12px">Login: http://kepez.com</td>
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