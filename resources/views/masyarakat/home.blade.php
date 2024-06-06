@extends('masyarakat.master')

<div class="navbars" style="background-image:url('images/navbar-image.png');filter:blur(2px);width:100vw;z-index:1">
</div>
@section('content')
    <div style="width:100vw;height:85.5vh;position:relative;padding-top:70px">
        <div style="position:fixed;z-index:-1;top:0;left:0;width:100%;height:100%;background-image:url('images/background-home1.png');background-repeat:no-repeat;background-position:center;background-size:cover;opacity:0.4;">
        </div>
        <div class="mx-auto text-center" style="z-index:1;position:relative;margin-top:100px">
            <h1 style="color:#780000;">SATGAS PEMBERANTAS PUNGLI</h1>
            <h6 style="color:#336683;margin-top:20px">Selamat datang di situs resmi Gerakan Nasional Stop Pungli Parkir! <br> Kami berkomitmen memberantas pungutan liar di area parkir
                untuk pelayanan yang jujur dan transparan. <br> Laporkan pungli parkir yang Anda temui. Mari dukung upaya kami dan bersama-sama wujudkan Indonesia yang lebih baik!</h6>
                <button class="btn" style="background-color:#780000;color:white;padding:10px 100px;margin-top:50px;border-radius:25px">ADU DI SINI</button>
        </div>

    </div>

    <div class="steps-body" style="z-index: 1">
        <h1 style="color: #FEF0D5">Yuk, ikuti 3 langkah ini untuk melakukan laporan!</h1>
    <div class="steps d-flex flex-row">
        <div class="step" style="background-color: #871717">
            <div class="nomor mx-auto">
                <h2>1</h2>
            </div>
            <h3>Register</h3>
            <a href="{{url('register')}}">Klik disini</a>
        </div>
        <div class="step" style="background-color:#AD4141">
            <div class="nomor mx-auto">

                <h2>2</h2>
            </div>
            <h3>Login</h3>
            <a href="{{url('login')}}">Klik disini</a>
        </div>
        <div class="step" style="background-color:#DF7374">
            <div class="nomor mx-auto">

                <h2>3</h2>
            </div>
            <h3>Lacak status aktivitas</h3>
            <a href="#">Klik disini</a>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-evenly align-items-center" style="margin-bottom:50px">
        <div class="profile text-start">
            <img src="{{asset('images/jokowi.jpg')}}" alt="Presiden Joko Widodo">
        </div>
        <div>
            <p style="text-align: center;color:white">Pada 20 Oktober 2016, Joko Widodo menandatangani Peraturan Presiden (Perpres) Nomor 87 Tahun 2016 <br>
                tentang Satuan Tugas Sapu Bersih Pungutan Liar yang disebut Satgas Saber Pungli yang berkedudukan langsung <br> di bawah tanggung jawab Presiden.
                Berdasarkan Peraturan Presiden tersebut, <br> Satgas Saber Pungli mempunyai tugas melaksanakan pemberantasan pungutan liar secara efektif dan efisien <br>
                 dengan mengoptimalkan pemanfaatan personil, satuan kerja, dan sarana-prasarana, <br> baik yang berada di kementerian/lembaga maupun pemerintah daerah.</p>
        </div>
    </div>

    </div>
@endsection
