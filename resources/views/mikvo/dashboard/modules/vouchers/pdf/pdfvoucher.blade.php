<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style></style>
</head>
<body>    
  <div class="col-md-12">     
    <table class="table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>qr</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($detailv as $detail)
        <tr>
          <td>{{$detail->user_detailv}}</td>
          <td>{{$detail->password_detailv}}</td>
          <td>{{$voucher->nprofile_voucher}}</td>
          <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($voucher->nprofile_voucher)) !!} "></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>