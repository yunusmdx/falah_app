<?php

namespace App\Http\Controllers;

use App\Models\Bast;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BastController extends Controller
{
    public function print(Request $request, Bast $bast)
        {
            $bast->load(['lampirans.starlink']);

            $pdf = Pdf::loadView('pdf.bast', compact('bast'))
                ->setPaper('A4', 'portrait');

            $cleanNoBast = preg_replace('/[^A-Za-z0-9\-]/', '-', $bast->no_bast);
            $filename = 'File-' . $cleanNoBast . '.pdf';

            return $request->boolean('download')
                ? $pdf->download($filename)
                : $pdf->stream($filename);
        }

}