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
<div class="image-gallery mt-3 d-flex">
    <div class="navigation-buttons text-center mt-3">
        <span class="arrow" id="prevButton">&lt;</span>
    </div>
    <div class="images-container d-flex justify-content-around">
        <div class="images d-flex">
            @foreach ($news as $new)
            <div class="image-container">
                <img src="{{ asset('$new->bukti_solved') }}" alt="Image 1" class="gallery-image">
                <div class="image-title">{{$new->judul}}</div>
                <div class="image-description">{{$new->komentar}}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="navigation-buttons text-center mt-3">
        <span class="arrow" id="nextButton">&gt;</span>
    </div>
</div>

@endsection
