<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
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



        /* .form-floating {
            width: 90%;
        } */
        .steps-body {
            background-color: #933131;
            padding-top: 50px;
            padding-bottom: 50px;
            text-align: center;
        }

        .steps {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .step {
            padding: 20px;
            background-color: #75222d;
            width: 33.4%;
            height: 250px;
        }

        .step h2 {
            font-size: 2rem;
        }

        .step a {
            display: block;
            margin-top: 10px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .profile {
            margin-top: 50px;
        }

        .profile img {
            border-radius: 10px;
            max-width: 200px;
            width: 150%;
        }

        .nomor {
            margin-top: 30px;
            padding: 22.5px 5px;
            background-color: #421F1F;
            color: #FEF0D5;
            border-radius: 50%;
            width: 20%;
        }

        .step h3 {
            margin-top: 10px;
        }

        .rectangle13 {
            background-color: rgba(255, 255, 255, 0.23000000417232513);
            height: 600px;
            width: 80vw;
            filter: drop-shadow(0px 2px 8.4px rgba(1, 1, 1, 0.11999999731779099));
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.46000000834465027);
            z-index: 1;
            position: relative;
        }

        .form-floating {
            width: 90%;
        }

        .button {
            padding: 10px 190px;
            background-color: #FEF0D5;
            color: #002F49;
            border: none;
            border-radius: 50px;
        }

        .ellipse7 {
            background-color: #c1121f;
            height: 730px;
            width: 730px;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(-200px, -180px)
        }

        .ellipse9 {
            background-color: rgba(217, 217, 217, 0.2800000011920929);
            height: 743px;
            width: 743px;
            border-radius: 50%;
            filter: blur(50px);
            position: absolute;
            bottom: 0;
            right: 0;
            transform: translate(200px, 350px);
        }

        .detailstatus-body {
            /* margin: 0%; */
            padding: 0%;
            font-family: sans-serif;
        }

        .status-body {
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

        .bg-box {
            min-width: 100%;
            min-height: 100%;
        }

        .image-gallery {
            position: relative;
            width: 80%;
            margin: auto;
            margin-bottom: 50px;
        }

        .images {
            display: flex;
            justify-content: space-between;
        }

        .image-container {
            position: relative;
            width: 30%;
            overflow: hidden;
            transition: transform 0.5s ease;
        }

        .image-container img {
            border-radius:20px;
        }

        .gallery-image {
            width: 100%;
            display: block;

        }

        .image-title {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px 10px;
            font-size: 1.2em;
        }

        .image-description {
            position: absolute;
            bottom: 40px;
            left: 10px;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px 10px;
            font-size: 1em;
            display: none;
        }

        .image-container:hover .image-description {
            display: block;
        }
    </style>
</head>

<body>
    <ul class="nav justify-content-end" style="background-color: #003049;width:100vw"
        style="z-index: 2;position: fixed;">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/news') }}">News</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/pengaduan') }}">Pengaduan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Chat</a>
        </li>
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('showStatus') }}">Status</a>
            </li>
            <li class="nav-item dropdown" style="list-style-type: none;">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Profil
                </a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="dropdown-item"
                        href="{{ route('profile', ['customer_email' => Auth::user()->customer_email]) }}" style="color: black">Lengkapi Data</a></li> --}}
                    <li><a class="dropdown-item" href="" style="color: black">Edit Akun</a></li>
                    {{-- <form action="{{ route('user-logout')}}" method="post"> --}}
                    <li><a class="dropdown-item" href="{{ route('user-logout') }}" style="color: black">Logout</a></li>
                    {{-- </form> --}}
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
        @endauth

    </ul>
    <div style="width:100vw;height: 10px;background-color:#780000" style="z-index: 2">
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let currentIndex = 0;
            const images = document.querySelectorAll('.image-container');
            const totalImages = images.length;
            const imagesContainer = document.querySelector('.images');

            document.getElementById('nextButton').addEventListener('click', () => {
                currentIndex = (currentIndex + 3) % totalImages;
                updateGallery();
            });

            document.getElementById('prevButton').addEventListener('click', () => {
                currentIndex = (currentIndex - 3 + totalImages) % totalImages;
                updateGallery();
            });

            function updateGallery() {
                const offset = -currentIndex * (100 / 3);
                imagesContainer.style.transform = `translateX(${offset}%)`;
            }

            // Initial display
            updateGallery();
        });
        </script>



</body>

</html>
