<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tag.show', compact('tag'));
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        return redirect()->route('tag.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        $tag->save();
        return redirect()->route('tag.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
?>