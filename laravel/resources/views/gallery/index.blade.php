<h1>Gallery Index</h1>

@foreach($galleries as $gallery)
    <h2>{{ $gallery->title }}</h2>
    <p>{{ $gallery->description }}</p>
    <a href="{{ route('gallery.show', $gallery->id) }}">View Gallery</a>
@endforeach