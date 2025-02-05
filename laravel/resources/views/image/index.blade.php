<h1>Image Index</h1>

<ul>
    @foreach($images as $image)
        <li>
            <a href="{{ url('/gallery/'.$image->gallery_id.'/image/'.$image->id.'/show') }}">{{ $image->title }}</a>
        </li>
    @endforeach
</ul>