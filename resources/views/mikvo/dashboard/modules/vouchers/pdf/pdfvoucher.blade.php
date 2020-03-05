<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style></style>
</head>
<body>
    <div class="container">
        <h2>Basic Table</h2>
        <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
        <table class="table">
          <thead>
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($detailv as $detail)
              <tr>
                <td>{{$detail->user_detailv}}</td>
                <td>{{$detail->password_detailv}}</td>
                <td>{{$voucher->nprofile_voucher}}</td>
              </tr>
              @endforeach
            
          </tbody>
        </table>
      </div>
</body>
</html>