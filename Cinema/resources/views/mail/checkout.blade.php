<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Sep 2021 02:34:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ url('front-end') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/animate.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/odometer.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="{{ url('front-end') }}/css/main.css">

    <link rel="shortcut icon" href="{{ url('front-end') }}/images/favicon.png" type="image/x-icon">

    <title>Boleto - Online Ticket Booking Website HTML Template</title>

    <style>
        th, td{
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>Thank you for buying from us! Have a good day!</h1>
    <table class="table table-bordered" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Name</th>
                <th scope="col">Price </th>
                <th scope="col">Quantity </th>
                <th scope="col">Date </th>
                <th scope="col">Time </th>
                <th scope="col">Cinema </th>
                <th scope="col">Room </th>
                <th scope="col">Chair </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart->content() as $item)
                <tr>
                    <td>Movie</td>
                    <td>{{ $item['detail']->film->name }}</td>
                    <td>{{ number_format($item['price'], 2) }}$</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>{{ $item['detail']->date }}</td>
                    <td>{{ $item['detail']->time->time }}</td>
                    <td>{{ $item['detail']->cinema->name }}</td>
                    <td>{{ $item['detail']->room->name }}</td>
                    <td>{{ strtoupper(implode(',', $item['seat'])) }}</td>
                </tr>
            @endforeach
            @foreach ($cart->content_food() as $item)
                <tr>
                    <td>Food</td>
                    <td>{{ $item['pro']->name }}</td>
                    <td>{{ number_format($item['price'], 2) }}$</td>
                    <td>{{ $item['qty'] }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="{{ url('front-end') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('front-end') }}/js/modernizr-3.6.0.min.js"></script>
    <script src="{{ url('front-end') }}/js/plugins.js"></script>
    <script src="{{ url('front-end') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('front-end') }}/js/heandline.js"></script>
    <script src="{{ url('front-end') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ url('front-end') }}/js/magnific-popup.min.js"></script>
    <script src="{{ url('front-end') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('front-end') }}/js/wow.min.js"></script>
    <script src="{{ url('front-end') }}/js/countdown.min.js"></script>
    <script src="{{ url('front-end') }}/js/odometer.min.js"></script>
    <script src="{{ url('front-end') }}/js/viewport.jquery.js"></script>
    <script src="{{ url('front-end') }}/js/nice-select.js"></script>
    <script src="{{ url('front-end') }}/js/main.js"></script>
    <script src="{{ url('front-end') }}/js/sweetalert2@11.js"></script>
    @yield('script')
</body>


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Sep 2021 02:34:42 GMT -->

</html>