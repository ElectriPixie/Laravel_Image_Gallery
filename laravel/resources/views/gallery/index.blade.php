<h1>Gallery Index</h1>
@foreach($galleries as $gallery)
    <h2>{{ $gallery->title }}</h2>
    <p>{{ $gallery->description }}</p>
    <a href="{{ url('gallery/show', $gallery->id) }}">View Gallery</a>
    <form action="{{ url('gallery/' . $gallery->id . '/destroy') }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Delete Gallery</button>
    </form>
@endforeach
<p><a href="{{ url('gallery/create') }}">Create New Gallery</a></p>
