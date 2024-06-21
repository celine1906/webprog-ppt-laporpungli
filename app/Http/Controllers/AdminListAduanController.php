<?php

namespace App\Http\Controllers;

use App\Models\BuatLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
        $aduan->status = 'solved';
        $aduan->komentar = $request->comments;

        if ($request->hasFile('bukti_solved')) {
            $buktiSolvedPath = $request->file('bukti_solved')->store('bukti-solved', 'public');
            $aduan->bukti_solved = $buktiSolvedPath;
        }

        $aduan->save();

        return redirect()->route('adminaduan')->with('success', 'Aduan updated successfully.');
    }

    public function updateCluster()
    {
        $aduans = BuatLaporan::all();

        $scriptPath = base_path('predict_cluster.py');

        foreach ($aduans as $aduan) {
            $data = [
                $aduan->tanggal_kejadian,
                $aduan->alamat_kejadian,
                $aduan->pesan
            ];

            $process = new Process(['python3', $scriptPath, ...$data]);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $cluster = trim($process->getOutput());

            $aduan->cluster = $cluster;
            $aduan->save();
        }

        return redirect()->route('adminaduan')->with('success', 'Clusters updated successfully.');
    }
}
