@extends('masyarakat.master')

@section('content')
    <div style="width: 100vw;height:100%;background-color:#002F49;padding:50px 0;">
        <div class='ellipse7' style="margin-top:-100px;margin-left:-50px ">
        </div>
        <div id='rectangle13' class='rectangle13' style="margin: auto; ">
            <h1 style="margin: 30px auto;text-align:center;color:#F2F6C7">Register</h1>
            <form action="">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com" required>
                    <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Alamat Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
            </form>
        </div>
    </div>
@endsection
