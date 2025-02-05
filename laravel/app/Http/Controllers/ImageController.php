<?php
namespace App\Http\Controllers;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image as Gallery_Image;

class ImageController extends Controller
{
    public function createThumbnail($image, $size = [250, 250])
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

    public function index($gallery_id)
    {
        // Display a list of all images
        $images = Gallery_Image::where('gallery_id', $gallery_id)->get();
        return view('image.index', ['images' => $images]);
    }
    
    public function show($gallery_id, $image_id, $page)
    {
        // Display a single image
        $image = Gallery_Image::find($image_id);
        $gallery = Gallery::find($gallery_id);
        return view('image.show', ['image' => $image, 'gallery' => $gallery, 'page' => $page]);
    }
    
    public function create($gallery_id)
    {
        // Display a form to create a new image in the given gallery
        return view('image.create', ['gallery' => Gallery::find($gallery_id)]);
    }
    
    public function store(Request $request, $gallery_id)
    {
        $image = new Gallery_Image();
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->gallery_id = $gallery_id;
        
        if ($request->hasFile('image_path')) {
            $image->image_path = $request->image_path->store('images', 'public');
            $thumbnail = $this->createThumbnail($image, [150, 150]);
            $image->thumbnail = $thumbnail;
        }
        
        $image->save();
        return redirect(url('/gallery/' . $image->gallery_id . '/image/' . $image->id));
    }
    
    public function edit($gallery_id, $image_id)
    {
        // Display a form to edit an existing image
        $image = Gallery_Image::find($image_id);
        return view('image.edit', ['image' => $image]);
    }
    
    public function update(Request $request, $gallery_id, $image_id)
    {
        $image = Gallery_Image::find($image_id);
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->save();
        return redirect(url('/gallery/' . $image->gallery_id . '/image/' . $image->id));
    }
    
    public function destroy($gallery_id, $image_id)
    {
        // Delete an image
        $image = Gallery_Image::find($image_id);
        $image->delete();
        return redirect(url('/gallery/' . $gallery_id . '/show'));
    }
}
?>