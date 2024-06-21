<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ClusteringController extends Controller
{
    public function cluster()
    {
        $process = new Process(['python3', base_path('clustering.py')]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->json([
            'message' => 'Clustering completed successfully',
            'output' => $process->getOutput()
        ]);
    }
}
