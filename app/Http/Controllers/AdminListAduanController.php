<?php

namespace App\Http\Controllers;

use App\Models\BuatLaporan;
use Illuminate\Http\Request;

class AdminListAduanController extends Controller
{
    public function index()
    {
        $aduans = BuatLaporan::all();
        return view('admin.list-aduan', compact('aduans'));
    }

    public function adminShow($id)
    {
        $aduan = BuatLaporan::find($id);
        return view('admin.admindetailaduan', compact('aduan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $aduan = BuatLaporan::find($id);
        $aduan->status = $request->status;
        $aduan->komentar = $request->comments;
        $aduan->status = 'solved';

        if ($request->hasFile('bukti_solved')) {
            $buktiSolvedPath = $request->file('bukti_solved')->store('bukti-solved', 'public');
            $aduan->bukti_solved = $buktiSolvedPath;
        }

        $aduan->save();

        return redirect()->route('adminaduan')->with('success', 'Aduan updated successfully.');
    }
}

