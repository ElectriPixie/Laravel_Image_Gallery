@if($gallery)
    <h1>Gallery: {{ $gallery->title }}</h1>
    <p>{{ $gallery->description }}</p>

    <h2>Images:</h2>
    @if($gallery->images()->exists())
        @foreach($gallery->images as $image)
            <img src="{{ $image->image_path }}" alt="{{ $image->title }}">
        @endforeach
    @else
        <p>No images found.</p>
    @endif
@endif