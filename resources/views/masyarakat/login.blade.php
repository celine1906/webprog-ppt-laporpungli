<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <style>
        body {
            overflow: hidden;
        }
        .rectangle13 {
            background-color: rgba(255, 255, 255, 0.23000000417232513);
            height: 600px;
            width: 542px;
            filter: drop-shadow(0px 2px 8.4px rgba(1, 1, 1, 0.11999999731779099));
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.46000000834465027);
            z-index: 1;
            position: relative;
        }

        .ellipse7 {
            background-color: #FEF0D5;
            height: 730px;
            width: 730px;
            border-radius: 50%;
            filter: blur(200px);
            z-index: 1;
            position: absolute;
            /* top: 1;
            left: 1; */
            transform: translate(-30%, -30%);
        }

        .button {
            padding: 10px 190px;
            background-color: #FEF0D5;
            color: #002F49;
            border: none;
            border-radius: 50px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 100vh;
        }

        .rectangle-container {
            display: flex;
            gap: 0; /* No gap between rectangles */
        }
    </style>
</head>

<body>
    <div style="width: 100vw;height:100%;background-color:#780001">
        <div class='ellipse7'></div>
        <div class="container" style="position: relative">
            <div class="rectangle-container">
                <div id='rectangle13' class='rectangle13 d-flex flex-column mb-3 justify-content-center align-items-center'>
                    <h1 style="color: #FEF0D5">SAMBATPUNGLI</h1>
                    <h2 style="color: white">Pemerintah Kota Malang</h2>
                </div>
                <div id='rectangle13' class='rectangle13 d-flex flex-column mb-3 justify-content-center align-items-center' style="position: relative">
                    <h1 style="margin: 30px auto;text-align:center;color:#F2F6C7">Selamat Datang</h1>
                    <form action="">
                        <div class="form-floating mb-3 mx-auto" style="background-color: rgba(255, 255, 255, 0);color:white">
                            <input type="email" class="form-control" id="floatingInput" name="email" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                            <label class="floating-input" for="floatingInput">Alamat Email</label>
                          </div>
                        <div class="form-floating mb-3 mx-auto" style="background-color: rgba(255, 255, 255, 0);color:white">
                            <input type="password" class="form-control" name="password" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                            <label class="floating-input" for="floatingInput">Password</label>
                          </div>

                        <div class="text-center mb-4">
                            <button class="button">Masuk</button>
                        </div>
                        <p style="color: white" class="text-center">Belum punya akun? <a href="{{url('register')}}">Daftar</a></p>
                    </form>
                </div>
            </div>
        </div>
        <div class='ellipse7' style="bottom:0;right:0;transform:translate(40%,50%)"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"></script>
</body>

</html>
