<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuatLaporan;

class NewsController extends Controller
{
    public function showNews() {
        $news = BuatLaporan::where('status', 'solved')->get();
        \Log::info($news); // Tambahkan log untuk memeriksa data

        return view('masyarakat.news-page', ['news' => $news]);
    }
}
