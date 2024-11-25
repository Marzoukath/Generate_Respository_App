<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Citizen;

class PdfController extends Controller
{
    public function generatePDF($id)
    {
        $user = Citizen::findOrFail($id);

        $pdf = Pdf::loadView('pdf', compact('user'));
     
        return $pdf->download('certificat_residence.pdf');
    }
}
