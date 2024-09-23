<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadTestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'activity_report' => 'required|file|max:262144',
        ]);

        $path = $request->file('activity_report')->store('uploads');

        return response()->json(['path' => $path]);
    }
}
