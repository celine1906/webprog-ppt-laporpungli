<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BuatLaporan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminListAduanController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ClusteringController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// ADMIN

Route::get('/admin/login',[AdminAuthController::class,'login'])->name('adminlogin');
Route::get('/admin/register',[AdminAuthController::class,'register'])->name('adminregister');
Route::get('/admin/dashboard',[AdminAuthController::class,'dashboard'])->name('admindashboard');

Route::post('proses_login_admin',[AdminAuthController::class,'proses_login'])->name('proses.login.admin');
Route::post('proses_register_admin',[AdminAuthController::class,'proses_register'])->name('proses.register.admin');

Route::get('/admin/aduan', [AdminListAduanController::class, 'index'])->name('adminaduan');
Route::get('/admin/aduan/{id}', [AdminListAduanController::class, 'adminShow'])->name('admin.aduan.show');
Route::post('/admin/aduan/{id}/solved', [AdminListAduanController::class, 'updateStatus'])->name('admin.updateStatus');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('admin.chat.index');
    Route::get('/chat/{user}', [ChatController::class, 'show'])->name('admin.chat.show');
    Route::post('/chat/{user}/send', [ChatController::class, 'send'])->name('admin.chat.send');
});

Route::bind('user', function ($value) {
    return User::where('id_user', $value)->first() ?? abort(404);
});

Auth::routes();
Route::post('logout',[AdminAuthController::class,'logout'])->name('admin-logout');
Route::get('/cluster', [ClusteringController::class, 'cluster'])->name('cluster');
// Rute untuk memperbarui cluster
Route::get('/update-cluster', [AdminListAduanController::class, 'updateCluster'])->name('updateCluster');




// USER

Route::middleware('guest.custom')->group(function () {
    Route::get('/login', [UserAuthController::class, 'login'])->name('login');
    Route::get('/register', [UserAuthController::class, 'register'])->name('register');
    Route::post('/proses_login', [UserAuthController::class, 'proses_login'])->name('proses.login.user');
    Route::post('/proses_register', [UserAuthController::class, 'proses_register'])->name('proses.register.user');
});

// Routes yang hanya bisa diakses oleh pengguna yang sudah login
Route::middleware('auth.custom')->group(function () {
    Route::get('/pengaduan', [UserAuthController::class, 'showPengaduan'])->name('showPengaduan');
    Route::post('/buat-laporan', [BuatLaporan::class, 'buatLaporan'])->name('buat-laporan');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user-logout');
    Route::get('/status', [StatusController::class, 'index'])->name('showStatus');
    Route::get('/detailstatus/{id}', [StatusController::class, 'detail'])->name('detailStatus');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
});


Route::get('/detailstatus', function () {
    return view('masyarakat.detailstatus');
});

Route::get('/news', [NewsController::class, 'showNews'])->name('news');
Route::get('/home', [UserAuthController::class, 'home'])->name('home');
