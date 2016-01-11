<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventory Management System</title>

    {{--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>--}}
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    <div class="jumbotron header" id="jumbotronHeader">
        <div class="container">
            @if (!Auth::guest())
                <h6>
                    <span class="glyphicon glyphicon-user"></span>
                    {{ Auth::user()->name }} |
                    {{ date('l, d/m/Y') }} |
                    <a href="{{ url('/logout') }}">
                        <span class="glyphicon glyphicon-off"></span>
                        Keluar Aplikasi
                    </a>
                </h6>
                <br/>
            @endif
            <h1>Inventory Manangement System</h1>
            <h2>ORDER PEMBELIAN & ORDER PENJUALAN</h2>
            @if (!Auth::guest())
                <ul class="nav">
                    <li class="active">
                        <a href="/" class="menu">
                            <span class="glyphicon glyphicon-home"></span>
                            Halaman Utama
                        </a>
                    </li>
                    <li>
                        <a href="/item" class="menu">
                            <span class="glyphicon glyphicon-file"></span>
                            Barang & Persediaan
                        </a>
                    </li>
                    <li>
                        <a href="/purchase" class="menu">
                            <span class="glyphicon glyphicon-import"></span>
                            Order Pembelian
                        </a>
                    </li>
                    <li>
                        <a href="/sale" class="menu">
                            <span class="glyphicon glyphicon-export"></span>
                            Order Penjualan
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>

    @yield('content')

    <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    @yield('script')
</body>
</html>
