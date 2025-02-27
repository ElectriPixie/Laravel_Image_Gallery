<head>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<div class="gallery-index">
    <h1>Gallery Index</h1>

    @foreach($galleries as $gallery)
        <div class="card">
            <h2>{{ $gallery->title }}</h2>
            @if($gallery->images()->exists())
                @foreach($gallery->images as $image)
                    <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}" style="width: 200px; height: 200px; object-fit: cover;">
                    @break
                @endforeach
            @endif
            <p>{{ $gallery->description }}</p>
            <div class="button-group">
                <button class="view-button" onclick="location.href='{{ url('/gallery/'.$gallery->id.'/show') }}'">
                    View Gallery
                </button>
                <button class="delete-button" onclick="document.querySelector('#delete-form-{{ $gallery->id }}').submit()">
                    Delete Gallery
                </button>
            </div>
            <form id="delete-form-{{ $gallery->id }}" action="{{ url('/gallery/'.$gallery->id.'/destroy') }}" method="post">
                @csrf
                @method('delete')
            </form>
        </div>
    @endforeach
    <button class="create-button" onclick="location.href='{{ url('/gallery/create') }}'">
        Create New Gallery
    </button>
</div>