<head>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<div class="gallery-show">
    @if($gallery)
        <h1>{{ $gallery->title }}</h1>
<!--         <p>{{ $gallery->description }}</p> -->

        @if($gallery->images()->exists())
            <div class="image-grid">
                @foreach($gallery->images as $image)
                    <a href="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/show') }}">
                        <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}" style="width: 200px; height: 200px; object-fit: cover;" class="bordered-image">
                    </a>
                @endforeach
            </div>
            <p><a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}" class="create-button">Add an image to this gallery</a></p>
        @else
            <p>No images found. <a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}" class="create-button">Add an image to this gallery</a></p>
        @endif
    @endif
</div>