<?php

namespace App\Http\Controllers;

use App\Models\Bast;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BastController extends Controller
{
    public function print(Request $request, Bast $bast)
        {
            $bast->load('lampirans.starlink');

                return Pdf::loadView('pdf.bast', compact('bast'))
                    ->setPaper('A4')
                    ->stream('BAST-'.$bast->no_bast.'.pdf');

                 // jika download
                if ($request->download)
                {
                    return Pdf::loadView('pdf.bast', compact('bast'))
                        ->setPaper('A4')
                        ->download('BAST-'.$bast->no_bast.'.pdf');
                }

                // jika preview / print
                return $pdf->stream('BAST-' . $bast->no_bast . '.pdf');
        }


}
