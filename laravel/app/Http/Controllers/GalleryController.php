<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
#use App\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index');
    }

    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.show', ['gallery' => $gallery]);
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $gallery = new Gallery();
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        $gallery->save();
        return redirect(url('gallery/index'));
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