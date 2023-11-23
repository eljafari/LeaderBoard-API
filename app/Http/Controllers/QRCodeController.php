<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function show($id)
    {
        $path = storage_path("app/{$id}"."_qr.png");

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
