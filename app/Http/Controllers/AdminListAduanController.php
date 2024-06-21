<?php

namespace App\Http\Controllers;

use App\Models\BuatLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        // Adjust the paths based on your actual storage location
        $encoderPath = base_path('storage/app/public/encoder.pkl');
        $vectorizerPath = base_path('storage/app/public/vectorizer.pkl');
        $kmeansPath = base_path('storage/app/public/kmeans.pkl');

        $scriptPath = base_path('predict_cluster.py');

        foreach ($aduans as $aduan) {
            $data = [
                $aduan->tanggal_kejadian,
                $aduan->alamat_kejadian,
                $aduan->pesan,
                $encoderPath,
                $vectorizerPath,
                $kmeansPath
            ];

            // Call Python script with necessary arguments
            $process = new Process(['python', $scriptPath, ...$data]);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $predictedCluster = trim($process->getOutput());

            // Ensure the predicted cluster is not empty and valid
            if (is_numeric($predictedCluster)) {
                $aduan->cluster = (int) $predictedCluster;
                $aduan->save();
            } else {
                // Handle the case where prediction failed or returned invalid data
                Log::error("Failed to update cluster for aduan ID: {$aduan->id}. Predicted cluster: {$predictedCluster}");
            }
        }

        return redirect()->route('adminaduan')->with('success', 'Clusters updated successfully.');
    }


}
