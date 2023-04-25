<?php

namespace App\Http\Controllers;

use App\Models\Userinfo;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $allusers = Userinfo::all();
    $pdf = PDF::loadView('pdfgenerate',[
        'allusers' => $allusers
    ], [], null)->setPaper('A4');
    return $pdf->download('users.pdf');
    }
}
