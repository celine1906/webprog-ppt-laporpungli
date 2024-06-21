<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BuatLaporan;


class StatusController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $aduans = BuatLaporan::where('user_id', $user->id_user)->get();

        return view('masyarakat.status', compact('aduans'));

    }

    public function detail($id)
    {
        $aduan = BuatLaporan::findOrFail($id);

        return view('masyarakat.detailstatus', compact('aduan'));
    }
}
