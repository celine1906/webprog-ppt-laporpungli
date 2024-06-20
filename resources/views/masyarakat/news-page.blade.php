@extends('masyarakat.master')

@section('content')

        <h1 class="mt-5 text-center" style="color: #780000">FUNGSI MELAPORKAN PUNGLI</h1>
        <div class="steps d-flex flex-row text-center mx-auto">
            <div class="step" style="background-color: #8C0B0B;padding-top:150px;padding-left:50px;text-align:left">
                    <h3>Meningkatkan <br> Transparansi</h3>
            </div>
            <div class="step" style="background-color: #D92323;padding-top:150px;padding-left:50px;text-align:left">
                    <h3>Memberantas <br> Korupsi</h3>
            </div>
            <div class="step" style="background-color: #780001;padding-top:150px;padding-left:50px;text-align:left">
                    <h3>Meningkatkan <br> Kualitas Pelayanan</h3>
            </div>
        </div>

        <h2 class="mt-5 text-center" style="color: #780000;padding-top:100px">BERITA PELAPORAN PUNGLI YANG SUDAH KAMI TANGANI</h2>
        <div id="newsCarousel" class="carousel slide mt-3" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/image1-done.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/image2-done.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/image3-done.jpg')}}" class="d-block w-100" alt="...">
                </div>

            </div>
            <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>

@endsection
