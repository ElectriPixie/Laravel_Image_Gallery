<h1>Image Index</h1>

<ul>
    @foreach($images as $image)
        <li>
            <a href="{{ route('image.show', $image->id) }}">{{ $image->title }}</a>
        </li>
    @endforeach
</ul>