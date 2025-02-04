<h1>Gallery: {{ $gallery->title }}</h1>

<p>{{ $gallery->description }}</p>

<h2>Images:</h2>
@foreach($gallery->images as $image)
    <img src="{{ $image->image_path }}" alt="{{ $image->title }}">
@endforeach
