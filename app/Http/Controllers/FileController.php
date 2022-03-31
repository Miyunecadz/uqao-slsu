<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function open(Request $request)
    {
        $fileName = basename($request->file);
        $filePath = "/ViewerJS/#../storage/" . $fileName;
        return view('file', ['file' => $filePath]);
    }
}
