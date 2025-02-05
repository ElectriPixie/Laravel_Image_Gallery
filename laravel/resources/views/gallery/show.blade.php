<head>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<div class="gallery-show">
    @if($gallery)
        <h1>{{ $gallery->title }}</h1>
        @if(count($images) == 0)
            <p>No images found. <a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}" class="create-button">Add an image to this gallery</a></p>
        @else
            <div class="image-grid">
                @foreach ($images as $image)
                    <a href="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/show') }}">
                        <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}" style="width: 200px; height: 200px; object-fit: cover;" class="bordered-image">
                    </a>
                @endforeach
            </div>

            <div class="pagination">
                @for ($i = 1; $i <= $last_page; $i++)
                    <a href="{{ url('/gallery/'.$gallery->id.'/show/'.$i) }}" class="paginate-link {{ $page == $i ? 'active' : '' }}">{{ $i }}</a>
                @endfor
            </div>
            <p><a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}" class="create-button">Add an image to this gallery</a></p>
        @endif
    @endif
</div>