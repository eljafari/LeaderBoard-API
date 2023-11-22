<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function show($filename)
    {
        $path = storage_path("app/{$filename}");

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
