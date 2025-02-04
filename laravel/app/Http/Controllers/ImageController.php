<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image;

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



    public function create($gallery_id)
    {
        // Display a form to create a new image in the given gallery
        return view('image.create', ['gallery' => Gallery::find($gallery_id)]);
    }
    

    // In the ImageController, update the store method
    public function store(Request $request)
    {
        $image = new Image();
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->gallery_id = $request->input('gallery_id');
    
        if ($request->hasFile('image_path')) {
            $image->image_path = $request->image_path->store('images', 'public');
        }
    
        $image->save();
        return redirect(url('image/' . $image->id ));
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
        return redirect(url('image/index'));
    }

    public function destroy($id)
    {
        // Delete an image
        $image = Image::find($id);
        $image->delete();
        return redirect()->back();
    }
}
?>