<head>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<div class="image-show">
    <h1><a href="{{ url('/gallery/'.$gallery->id.'/show') }}">{{ $gallery->title }}</a><h1>
<!--     <h2>{{ $image->title }}</h2>
    <p>{{ $image->description }}</p> -->
    <a href="{{ url('/gallery/'.$image->gallery_id) }}">
        <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}" class="bordered-image" style="max-height: 60vh;">
    </a>

    <div class="image-actions">
        <form action="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/edit') }}" method="GET">
            <button type="submit">Edit</button>
        </form>

        <form action="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/destroy') }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </div>
</div>