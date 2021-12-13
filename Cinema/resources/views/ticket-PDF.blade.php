<!doctype html>
<html lang="en">

<head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .ticket {
            border: 1px solid black;
            padding: 20px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 30px;
        }

        .sub-title {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .seat {
            text-transform: uppercase;
        }

        li {
            display: inline-block;
            width: 45%;
        }

        ul {
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <div class="container">
        @foreach ($bill as $item)
            @if ($item->time_id)
                @foreach (json_decode($item->chair) as $value)
                    <div class="ticket">
                        <div class="title">
                            Boleto
                        </div>
                        <div class="sub">
                            <ul>
                                <li class="left">Cinema:</li>
                                <li class="right">
                                    {{ $time->where('id', $item->time_id)->first()->cinema->name }}</li>
                            </ul>
                            <ul>
                                <li class="left">Movie:</li>
                                <li class="right">
                                    {{ $time->where('id', $item->time_id)->first()->film->name }}</li>
                            </ul>
                            <ul>
                                <li class="left">Date:</li>
                                <li class="right">{{ $time->where('id', $item->time_id)->first()->date }}</li>
                            </ul>
                            <ul>
                                <li class="left">Time:</li>
                                <li class="right">
                                    {{ $time->where('id', $item->time_id)->first()->time->time }}</li>
                            </ul>
                            <ul>
                                <li class="left">Room:</li>
                                <li class="right">
                                    {{ $time->where('id', $item->time_id)->first()->room->name }}</li>
                            </ul>
                            <ul>
                                <li class="left">Seat:</li>
                                <li class="right seat">{{ $value }}</li>
                            </ul>
                            <ul>
                                <li class="left">Price:</li>
                                @if (str_contains('abcd', substr($value, 0,1)))
                                    <li class="right seat">
                                        {{ number_format($chair->where('id', 2)->first()->price, 2) }}$</li>
                                @elseif(str_contains('efgh', substr($value, 0,1)))
                                    <li class="right seat">
                                        {{ number_format($chair->where('id', 1)->first()->price, 2) }}$</li>
                                @else
                                    <li class="right seat">
                                        {{ number_format($chair->where('id', 3)->first()->price, 2) }}$</li>
                                @endif
                            </ul>
                        </div>
                        <div class="sub-title">
                            Have a good time!
                        </div>
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
