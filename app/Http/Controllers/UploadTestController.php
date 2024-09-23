<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadTestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:262144',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        $url = Storage::url("uploads/{$path}");

        return $url;
    }
}
