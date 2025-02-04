<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Gallery;

class ImageController extends Controller
{
    public function index()
    {
        // Display a list of all images
        $images = Image::all();
        return view('image.index', compact('images'));
    }

    public function show($id)
    {
        // Display a single image
        $image = Image::find($id);
        return view('image.show', compact('image'));
    }

    public function create()
    {
        // Display a form to create a new image
        return view('image.create');
    }

    // In the ImageController, update the store method
    public function store(Request $request)
    {
        $image = new Image();
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->image_path = $request->input('image_path');
        $image->gallery_id = $request->input('gallery_id');
        $image->save();
        return redirect()->route('image.index');
    }

    public function edit($id)
    {
        // Display a form to edit an existing image
        $image = Image::find($id);
        return view('image.edit', compact('image'));
    }

    // In the ImageController, update the update method
    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->image_path = $request->input('image_path');
        $image->gallery_id = $request->input('gallery_id');
        $image->save();
        return redirect()->route('image.index');
    }

    public function destroy($id)
    {
        // Delete an image
        $image = Image::find($id);
        $image->delete();
        return redirect()->route('image.index');
    }
}
?>