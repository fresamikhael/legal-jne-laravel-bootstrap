<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    function downloadPermit($path)
    {
        $file = public_path('Permit/' . $path);

        return response()->download($file);
    }
    function downloadLitigation($path)
    {
        $file = public_path('Litigation/' . $path);

        return response()->download($file);
    }
    function downloadDrafting($path)
    {
        $file = public_path('Drafting/' . $path);

        return response()->download($file);
    }

    function downloadRegulation($path)
    {
        $file = public_path('Regulation/' . $path);

        return response()->download($file);
    }

    function downloadDocumentRequest($path)
    {
        $file = public_path('document_request/' . $path);

        return response()->download($file);
    }

    function downloadPowerAttorney($path)
    {
        $file = public_path('PowerAttorney/' . $path);

        return response()->download($file);
    }

    function downloadLandSell($path)
    {
        $file = public_path('LandSell/' . $path);

        return response()->download($file);
    }
}
