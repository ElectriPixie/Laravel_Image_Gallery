<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageTag;

class ImageTagController extends Controller
{
    public function index($image_id)
    {
        $imageTags = ImageTag::where('image_id', $image_id)->get();
        return view('image-tag.index', compact('imageTags'));
    }

    public function store(Request $request)
    {
        $imageTag = new ImageTag();
        $imageTag->image_id = $request->input('image_id');
        $imageTag->tag_id = $request->input('tag_id');
        $imageTag->save();
        return redirect()->route('image-tag.index');
    }

    public function destroy($imageTag_id)
    {
        $imageTag = ImageTag::find($imageTag_id);
        $imageTag->delete();
        return redirect()->route('image-tag.index');
    }
}
?>