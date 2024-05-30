@extends('masyarakat.master')

<div class="navbars" style="background-image:url('images/navbar-image.png');filter:blur(2px);width:100vw">
</div>
@section('content')
    <div style="width:100vw;height:85.5vh;background-color: #C1121F;padding-top:70px">
        <div class="row">
            <div class="col-2 home-img">
                <img src="{{asset('images/image1.png')}}" style="width: 150px;height:150px" alt="">
                <img src="{{asset('images/image2.png')}}" style="width: 200px;height:200px;margin-left:120px" alt="">
                <img src="{{asset('images/image3.png')}}" style="width: 150px;height:150px" alt="">
            </div>
            <div class="col-2 text-center">
                <img src="{{ asset('images/foto-pj.png') }}" alt="pj malang" style="width: 600px;margin-left:100px">
            </div>
            <div class="col-7" style="text-align: right;margin-top:100px;margin-right:125px">
                <h1 style="color: #F2F6C7">MALANG</h1>
                <p style="color: white">Menuju malang semakin maju dan<br>menerima aspirasi masyarakat</p>
            </div>

        </div>
    </div>

@endsection
