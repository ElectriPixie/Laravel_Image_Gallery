@if($gallery)
    <h1>Gallery: {{ $gallery->title }}</h1>
    <p>{{ $gallery->description }}</p>

    <h2>Images:</h2>
    @if($gallery->images()->exists())
        @foreach($gallery->images as $image)
            <img src="{{ $image->image_path }}" alt="{{ $image->title }}">
        @endforeach
        <p><a href="{{ url('image/' . $gallery->id . '/create') }}">Add an image to this gallery</a></p>
    @else
        <p>No images found. <a href="{{ url('image/' . $gallery->id . '/create') }}">Add an image to this gallery</a></p>
    @endif
@endif