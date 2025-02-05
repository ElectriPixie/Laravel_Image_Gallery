<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index', ['galleries' => $galleries]);
    }

    public function show($id, $page)
    {
        $gallery = Gallery::find($id);
        $per_page = 21;
        $offset = ($page - 1) * $per_page;
        $images = $gallery->images()->skip($offset)->take($per_page)->get();
    
        $total_images = $gallery->images()->count();
        $last_page = ceil($total_images / $per_page);
    
        return view('gallery.show', ['gallery' => $gallery, 'images' => $images, 'last_page' => $last_page, 'page' => $page]);
    }
    
    
    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        if (!$request->has('title') || !$request->has('description')) {
            return redirect()->back()->with('error', 'Title and description are required');
        }
    
        $gallery = new Gallery();
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
    
        if (!$gallery->save()) {
            return redirect()->back()->with('error', 'Failed to save gallery');
        }
        return redirect(url('gallery/' . $gallery->id . '/show'));
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.edit');
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        $gallery->save();
        return redirect(url('gallery/index'));
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect(url('gallery/index'));
    }
}
?>