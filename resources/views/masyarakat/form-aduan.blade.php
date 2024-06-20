@extends('masyarakat.master')

@if ($errors->any())
    <div class="col-12">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@section('content')
    <div class="mx-auto text-center" style="background-color:#780000; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div class="ellipse7"></div>
        <div id='rectangle13 d-flex flex-column mb-3 justify-content-center align-items-center' class='rectangle13' style="position: relative;">
            <h1 style="margin: 30px auto;text-align:center;color:#F2F6C7">Form Laporan</h1>
            <form action="{{ route('buat-laporan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3 mx-auto" style="background-color: rgba(255, 255, 255, 0);color:white">
                    <input type="text" class="form-control" id="floatingInput" name="alamat_kejadian" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Alamat Kejadian</label>
                </div>
                <div class="form-floating mb-3 mx-auto" style="background-color: rgba(255, 255, 255, 0);color:white">
                    <input type="date" class="form-control" name="tanggal_kejadian" id="floatingInput" style="background-color: rgba(255, 255, 255, 0);color:white" placeholder="name@example.com">
                    <label class="floating-input" for="floatingInput">Tanggal Kejadian</label>
                </div>
                <div class="form-floating mb-3 mx-auto" style="background-color: rgba(255, 255, 255, 0);color:white">
                    <textarea class="form-control" name="pesan" placeholder="Masukkan pesan Anda" id="floatingTextarea2" style="background-color: rgba(255, 255, 255, 0);color:white;height: 120px;" rows="7"></textarea>
                    <label for="floatingTextarea2">Pesan</label>
                </div>
                <div class="mb-5 mx-auto" style="width: 90%;background-color: rgba(255, 255, 255, 0);color:white">
                    <div class="input-group">
                        <span class="input-group-text" style="background-color: rgba(255, 255, 255, 0);color:white; border: none;">Foto Kejadian</span>
                        <input class="form-control form-control-lg" name="bukti_kejadian" id="formFileLg" type="file" style="background-color: rgba(255, 255, 255, 0);color:white; border-left: none;">
                    </div>
                </div>
                <div class="text-center mb-4">
                    <button class="button" type="submit">Kirim</button>
                </div>
            </form>
        </div>
        <div class="ellipse"></div>
    </div>
@endsection
