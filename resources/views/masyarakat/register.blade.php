<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <style>
        body {
            overflow: hidden;
            overflow-y: auto;
            height: 120vh;
            /* max-height: 110vh; */
        }
        .rectangle13 {
            background-color: rgba(255, 255, 255, 0.23000000417232513);
            height: 860px;
            width: 542px;
            filter: drop-shadow(0px 2px 8.399999618530273px rgba(1, 1, 1, 0.11999999731779099));
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.46000000834465027);
            z-index: 1;
            margin-top:70px;
            /* overflow-y: auto;
            max-height: 90vh; */
        }

        .ellipse7 {
            background-color: #FEF0D5;
            height: 730px;
            width: 730px;
            border-radius: 50%;
            filter: blur(200px);
            z-index: 1;
            position: absolute;
        }

        .form-outline {
            color: white;
            width: 80%;
            border-radius: 50px;
        }

        .form-outline label {
            color: white;
            border-radius: 50px;
        }
        .form-control {
            color: white;
        }

        .form-control:focus label{
            /* background-color:transparent; */
            background-color: rgba(255, 255, 255, 0);
        }

        .button {
            padding: 10px 190px;
            background-color: #FEF0D5;
            color: #002F49;
            border: none;
            border-radius: 50px;
        }

        .gender-container {
            width: 80%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            border: 1px solid rgb(246, 239, 239);
            border-radius:3px;
            padding: 15px 5px;
        }
        .gender-container label {
            margin-left: 10px;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div style="width: 100vw;height:160vh;background-color:#780001;padding:50px 0;">
        <div class='ellipse7' style="transform: translate(-100px,-300px)">
        </div>
        <div id='rectangle13 d-flex flex-column mb-3 justify-content-center align-items-center' class='rectangle13 mx-auto' style="position: relative">
            <h1 style="margin: 30px auto;text-align:center;color:#F2F6C7">Daftar</h1>
            <form action="">
                <div class="form-floating mb-3 mx-auto" style="width: 80%;background-color: rgba(255, 255, 255, 0);color:white">
                    <input type="text" name="name" class="form-control" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Nama Lengkap</label>
                  </div>
                  <div class="form-floating mb-3 mx-auto" style="width: 80%;background-color: rgba(255, 255, 255, 0);color:white">
                    <input type="date" class="form-control" name="tgl_lahir" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3 mx-auto" style="width: 80%;color:white">
                    <input type="text" name="nik" class="form-control" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">NIK(Nomor Induk Kependudukan)</label>
                  </div>
                  <div class="mb-3 gender-container mx-auto">
                    <label for="gender" class="text-start">Jenis Kelamin</label>
                    <input type="radio" id="gender" value="L" name="gender">
                    <label for="gender">Laki-Laki</label>
                    <input type="radio" id="gender" value="P" style="margin-left: 2vw;"  name="gender">
                    <label for="gender">Perempuan</label>
                  </div>
                <div class="form-floating mb-3 mx-auto" style="width: 80%;color:white">
                    <input type="text" name="alamat" class="form-control" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Alamat</label>
                  </div>
                <div class="form-floating mb-3 mx-auto" style="width: 80%;background-color: rgba(255, 255, 255, 0);color:white">
                    <input type="tel" name="no_telp" class="form-control" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Nomor Telepon</label>
                  </div>
                <div class="form-floating mb-3 mx-auto" style="width: 80%;background-color: rgba(255, 255, 255, 0);color:white">
                    <input type="email" name="email" class="form-control" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Alamat Email</label>
                  </div>
                <div class="form-floating mb-5 mx-auto" style="width: 80%;background-color: rgba(255, 255, 255, 0);color:white">
                    <input type="password" name="password" class="form-control" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Password</label>
                  </div>
                <div class="text-center mb-4">
                    <button class="button">Daftar</button>
                </div>
                <p style="color: white" class="text-center">Sudah punya akun? <a href="{{url('login')}}">Masuk</a></p>
            </form>
        </div>
        <div class='ellipse7' style="bottom:0;right:0;transform:translate(100px,400px)">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"></script>
</body>

</html>
