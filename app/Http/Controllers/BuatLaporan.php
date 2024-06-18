<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BuatLaporan extends Controller
{
    public function buatLaporan(Request $request)
    {
        $request->validate([
            'alamat_kejadian' => 'required|string',
            'tanggal_kejadian' => 'required|date',
            'pesan' => 'required',
            'bukti_kejadian' => 'required|file',
        ]);

        $user = auth()->user();

        // Simpan file bukti kejadian
        $buktiKejadianPath = $request->file('bukti_kejadian')->store('bukti-kejadian', 'public');
        $buktiKejadianFilename = basename($buktiKejadianPath); // Ambil nama file yang di-hash

        // Buat klien Guzzle
        $client = new Client();

        // Kirim data ke API Golang
        $response = $client->post('http://localhost:8080/aduan', [
            'multipart' => [
                [
                    'name'     => 'id_user',
                    'contents' => $user->id_user,
                ],
                [
                    'name'     => 'alamat_kejadian',
                    'contents' => $request->alamat_kejadian,
                ],
                [
                    'name'     => 'tanggal_kejadian',
                    'contents' => $request->tanggal_kejadian,
                ],
                [
                    'name'     => 'pesan',
                    'contents' => $request->pesan,
                ],
                [
                    'name'     => 'bukti_kejadian',
                    'contents' => fopen(storage_path('app/public/bukti-kejadian/' . $buktiKejadianFilename), 'r'),
                    'filename' => $buktiKejadianFilename,
                ],
            ],
        ]);

        // Periksa respons dari API
        if ($response->getStatusCode() == 200) {
            return redirect()->back()->with('success', 'Laporan berhasil dibuat!');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat laporan. Silakan coba lagi.');
        }
    }
}
