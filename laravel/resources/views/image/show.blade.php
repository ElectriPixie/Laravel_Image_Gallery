<h1>Image Show</h1>

<h2>{{ $image->title }}</h2>
<p>{{ $image->description }}</p>
<img src="{{ $image->image_path }}" alt="{{ $image->title }}">

<p>Tags:</p>
<ul>
    @foreach($image->tags as $tag)
        <li>{{ $tag->name }}</li>
    @endforeach
</ul>