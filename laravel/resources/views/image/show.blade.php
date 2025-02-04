<h1>Image Show</h1>

<h2>{{ $image->title }}</h2>
<p>{{ $image->description }}</p>
<img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}">