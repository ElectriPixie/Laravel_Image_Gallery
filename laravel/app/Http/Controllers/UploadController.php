<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload.upload');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $image->store('images', 'public');

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
}
?>