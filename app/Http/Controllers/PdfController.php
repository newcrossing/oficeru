<?php

namespace App\Http\Controllers;

use App\Models\Document as Doc;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function download($id)
    {

        $doc = Doc::where('pub', 1)->findOrFail($id);

//        if (file_exists(public_path('storage/docs/pdf/' . $doc->id . '.pdf'))) {
//            return Storage::download('public/docs/pdf/' . $doc->id . '.pdf', $doc->getShotName() . '.pdf');
//        } else {

            $mpdf = new \Mpdf\Mpdf();
            $stylesheet = file_get_contents(public_path('assets/css/styles-for-pdf.css'));
            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML('<div class="document">' . $doc->text . '</div>', \Mpdf\HTMLParserMode::HTML_BODY);

            $mpdf->OutputFile(public_path('storage/docs/pdf/' . $doc->id . '.pdf'));

            return Storage::download('public/docs/pdf/' . $doc->id . '.pdf', $doc->getShotName() . '.pdf');
//        }

    }
}
