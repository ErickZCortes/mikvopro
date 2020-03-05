<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style></style>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($de as $voucher)
                <tr>
                <td>{{$voucher->user_detailv}}</td>
                <td>{{$voucher->password_detailv}}</td>
                <td>{{$voucher->limitbin_detailv}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>