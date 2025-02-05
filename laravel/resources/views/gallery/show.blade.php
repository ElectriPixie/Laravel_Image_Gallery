@if($gallery)
    <h1>{{ $gallery->title }}</h1>
    <p>{{ $gallery->description }}</p>

    <h2>Images:</h2>
    @if($gallery->images()->exists())
        @foreach($gallery->images as $image)
            <a href="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/show') }}">
                <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}" style="width: 200px; height: 200px; object-fit: cover;">
            </a>
        @endforeach
        <p><a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}">Add an image to this gallery</a></p>
    @else
        <p>No images found. <a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}">Add an image to this gallery</a></p>
    @endif
@endif