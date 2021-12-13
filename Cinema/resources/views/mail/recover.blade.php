<style>
.invoice {
    font-family: 'Courier New', Courier, monospace;
    color: #000;
    font-size: 45px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 8px;
    margin-bottom: 20px;
    margin-left: 30px;
}

p {
    font-family: 'Courier New', Courier, monospace;
    color: #3b3636;
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 9px;
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>
</head>

<body>
    <div class="container">
        <h4 class="invoice">CSKH !</h4>
        <p><a href="{{route('reset_password',['token'=>$token])}}">Click</a> and follow the instructions to reset your password!</p>
        <h4 class="invoice">Thank You !</h4>
    </div>
</body>

</html>