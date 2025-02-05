<?php
namespace App\Http\Controllers;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image as Gallery_Image;

class ImageController extends Controller
{
    public function createThumbnail($image, $size = [150, 150])
    {
        // Define the path of the original image
        $originalPath = storage_path('app/public/' . $image->image_path);
    
        if (!file_exists($originalPath)) {
            throw new \Exception("File not found: " . $originalPath);
        }
    
        // Define the path for the thumbnail
        $thumbPath = storage_path('app/public/thumbnails/' . basename($image->image_path));
    
        // Ensure the thumbnails directory exists
        if (!file_exists(dirname($thumbPath))) {
            mkdir(dirname($thumbPath), 0755, true);
        }
    
        // Read the image and resize
        $img = Image::read($originalPath)
            ->cover($size[0], $size[1]) // Resize and maintain aspect ratio
            ->toJpeg(80); // Convert to JPEG with 80% quality
    
        // Save the thumbnail
        file_put_contents($thumbPath, (string) $img);
    
        return 'thumbnails/' . basename($image->image_path);
    }

    public function index()
    {
        // Display a list of all images
        $images = Gallery_Image::all();
        return view('image.index', compact('images'));
    }

    public function show($id)
    {
        // Display a single image
        $image = Gallery_Image::find($id);
        return view('image.show', compact('image'));
    }

    public function create($gallery_id)
    {
        // Display a form to create a new image in the given gallery
        return view('image.create', ['gallery' => Gallery::find($gallery_id)]);
    }

    public function store(Request $request)
    {
        $image = new Gallery_Image();
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->gallery_id = $request->input('gallery_id');
    
        if ($request->hasFile('image_path')) {
            $image->image_path = $request->image_path->store('images', 'public');
            $thumbnail = $this->createThumbnail($image, [150, 150]);
            $image->thumbnail = $thumbnail;
        }
    
        $image->save();
        return redirect(url('image/' . $image->id ));
    }    

    public function edit($id)
    {
        // Display a form to edit an existing image
        $image = Gallery_Image::find($id);
        return view('image.edit', compact('image'));
    }

    // In the ImageController, update the update method
    public function update(Request $request, $id)
    {
        $image = Gallery_Image::find($id);
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->image_path = $request->input('image_path');
        $image->gallery_id = $request->input('gallery_id');
        $image->save();
        return redirect(url('image/index'));
    }

    public function destroy($gallery_id, $image_id)
    {
        // Delete an image
        $image = Gallery_Image::find($image_id);
        $image->delete();
        return redirect()->back();
    }
}
?>