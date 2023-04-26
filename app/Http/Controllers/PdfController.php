<?php

namespace App\Http\Controllers;

use App\Models\Userinfo;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $allusers = Userinfo::all();
        $pdf = PDF::loadView('pdfgenerate', [
            'allusers' => $allusers,
        ])->setPaper('A4');

        return $pdf->download('users.pdf');
    }

    public function invoice($id)
    {
        $user =Userinfo::find($id);
        $pdf = PDF::loadView('invoice', [
            'user' => $user,
        ])->setPaper('A4');

        return $pdf->download('invoice.pdf');
    }

}
