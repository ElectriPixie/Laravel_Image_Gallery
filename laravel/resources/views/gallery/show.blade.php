@if($gallery)
    <h1>Gallery: {{ $gallery->title }}</h1>
    <p>{{ $gallery->description }}</p>

    <h2>Images:</h2>
    @if($gallery->images()->exists())
        @foreach($gallery->images as $image)
            <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}">
            <form action="{{ url('/gallery/'.$gallery->id.'/image/'.$image->id.'/destroy') }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endforeach
        <p><a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}">Add an image to this gallery</a></p>
    @else
        <p>No images found. <a href="{{ url('/gallery/'.$gallery->id.'/image/create') }}">Add an image to this gallery</a></p>
    @endif
@endif