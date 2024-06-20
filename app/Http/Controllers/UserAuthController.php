<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    //
    public function login()
    {
        return view('masyarakat.login');
    }

    public function register()
    {
        return view('masyarakat.register');
    }

    public function proses_login(Request $request)
    {
        // Isi credential hanya berupa email dan password
        $credentials = $request->only('email', 'password');

        // Validasi menggunakan Illuminate\Support\Facades\Validator
        // Isi field validasi dan rules nya yaitu wajib di isi
        $validate = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Jika terdapat field yang kosong
        if ($validate->fails()) {
            // Kembali ke halaman login & tampilkan error pada setiap inputnya
            return back()->withErrors($validate)->withInput();
        }

        // Verifikasi data user pada kolom email dan password sesuai atau belum
        if (Auth::attempt($credentials)) {
            // Jika sesuai, cek level pengguna
            $user = Auth::user();
            if ($user->level == 'user') {
                // Jika level pengguna adalah user, jalankan fungsi dashboard
                return redirect()->intended('home')->with('success', 'Successfully Logged In');
            } else {
                // Jika level pengguna bukan user, logout dan kembalikan pesan kesalahan
                Auth::logout();
                return redirect('login')->withInput()->withErrors(['login_error' => 'You do not have user access!']);
            }
        }

        // Kembali ke halaman login dan tampilkan pesan error pada login_error
        return redirect('login')->withInput()->withErrors(['login_error' => 'Username or password are wrong!']);
    }


    public function home()
    {
            return view('masyarakat.home');
    }

    public function proses_register(Request $request)
    {
        // Validasi menggunakan Illuminate\Support\Facades\Validator
        $validate = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'tgl_lahir' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        // Jika terdapat field yang kosong atau tidak valid
        if ($validate->fails()) {
            // Kembali ke halaman login & tampilkan error pada setiap inputnya
            return back()->withErrors($validate)->withInput();
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing password sebelum disimpan
            'level' => 'user', // Set level sebagai 'user'
            'tanggal_lahir' => $request->tgl_lahir,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        // Redirect ke halaman login admin dengan pesan sukses
        return redirect('/login')->with('success', 'You have successfully registered');
    }

    public function showPengaduan(){
        return view('masyarakat.form-aduan');
    }

    public function logout()
    {
        //  clear session dan memberitahu auth dengan status logout
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }
}
