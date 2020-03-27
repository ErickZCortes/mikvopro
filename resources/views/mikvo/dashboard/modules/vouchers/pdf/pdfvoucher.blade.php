<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
@page { 
  size: 595pt 890pt; 
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
        <table class="inside"  style="background-color: {{$template->bgcolor_template}};">
          <tbody>
            <tr>
              <td style="text-align: center; font-size: 14px;">
              <p style="font-family:{{$template->font_family}};">{{$voucher->nprofile_voucher}}</p>
                <td>
                  <img src="{{ base_path() }}/public/uploads/descarga.jpg" alt="logo" style="height:30px; text-align:center;">
                </td>
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
                            <td style="text-align: center; font-family: {{$template->font_family}};"><b>Usuario</b></td>
                            <td style="text-align: center; font-family: {{$template->font_family}};"><b>Contraseña</b></td>
                          </tr>
                          <tr>
                            <td style="border: 1px solid black; background-color: white; text-align: center; font-family: {{$template->font_family}};">{{$detaili->user_detailv}}</td>
                            <td style="border: 1px solid black; background-color: white; text-align: center; font-family: {{$template->font_family}};">{{$detaili->password_detailv}}</td>
                            <td>[{{$detaili->id}}]</td>
                          </tr>
                        </table>
                      </td>
                      <tr>
                        <td style="font-family: {{$template->font_family}}; font-size:12px; background-color:{{$template->color_template}};">${{$profile->sprice_profile}} pesos</td>                      </tr>
                      <tr>
                      <td style="font-family: {{$template->font_family}}; font-size:10px">Red: {{$voucher->dnsname_voucher}}</td>
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