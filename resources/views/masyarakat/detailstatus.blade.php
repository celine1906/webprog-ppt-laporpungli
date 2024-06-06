@extends('masyarakat.master')

@section('content')
<div class="detailstatus-body" style="position: relative; width: 100vw; height: 100vh; margin: 0; padding: 0;">
    <div style="position: absolute; width: 100%; height: 100%; background-image: url('{{ asset('images/image4.jpg') }}'); background-size: cover; background-position: center; filter: blur(2px); opacity: 0.5;"></div>

    <div style="position: relative; z-index: 1; text-align: center; color: white;">
        <h1 style="color: red; padding-top: 50px;">STATUS AKTIVITAS</h1>
        <div class="status-square" style="width: 430px; height: 90px; background-color: red; opacity: 0.5; margin: 20px auto 0; display: flex; justify-content: center; align-items: center;">
            <h2 style="color: rgb(0, 21, 116); text-align: center; margin: 0;">Cek laporan anda disini</h2>
        </div>
        <div class="status-square" style="width: 1156px; height: auto; background-color: rgb(255, 255, 255); margin: 20px auto 0; padding: 20px; box-sizing: border-box;">
            <h5 style="color: rgb(0, 17, 92); text-align: left; margin: 0;">
                sambatpunglimlg
            </h5>
            <p style="color: rgb(0, 0, 0); text-align: left; margin: 0;">
                kepada saya
            </p>
            <p style="color: rgb(0, 0, 0); text-align: left; margin: 10px;">
                Yth. Bapak/Ibu</br>
                di
                Tempat
            </p>
            <p style="color: rgb(0, 0, 0); text-align: left; margin: 10px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna 
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            </p>
        </div>
    </div>
</div>
@endsection
