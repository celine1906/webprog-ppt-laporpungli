<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }

        .nav-link {
            color: white;
            margin: 0 15px;
        }

        .home-body {
            width: 100vw;
            height: 100%;
            background-color: #C1121F;
        }

        .home-img img {
            border-radius: 50%;
        }

        .rectangle13 {
            background-color: rgba(255, 255, 255, 0.23000000417232513);
            height: 661px;
            width: 542px;
            filter: drop-shadow(0px 2px 8.399999618530273px rgba(1, 1, 1, 0.11999999731779099));
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.46000000834465027);
        }

        .ellipse7 {
            background-color: #336683;
            height: 730px;
            width: 730px;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
        }

        .form-floating {
            width: 80%;
            margin: auto;
            border-radius:30%;
        }

        .detailstatus-body {
            /* margin: 0%; */
            padding: 0%;
            font-family: sans-serif;
        }

        .status-body{
            font-family: sans-serif;
            position: relative;
            min-height: 150vh;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bg-box{
            min-width: 100%;
            min-height: 100%;
        }
    </style>
</head>

<body>
    <ul class="nav justify-content-end" style="background-color: #003049;width:100vw" style="z-index: 2">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/pengaduan') }}">Pengaduan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/masukan') }}">Masukan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Chat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/status') }}">Status</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">Login</a>
        </li>
    </ul>
    <div style="width:100vw;height: 10px;background-color:#780000" style="z-index: 2">
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
