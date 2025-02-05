<h1><a href="{{ url('/gallery/'.$gallery->id.'/show') }}">{{ $gallery->title }}</a><h1>
<h2>{{ $image->title }}</h2>
<p>{{ $image->description }}</p>
<a href="{{ url('/gallery/'.$image->gallery_id) }}">
    <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}">
</a>

<form action="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/update') }}" method="POST">
    @csrf
    @method('patch')
    <button type="submit">Update</button>
</form>

<form action="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/destroy') }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
