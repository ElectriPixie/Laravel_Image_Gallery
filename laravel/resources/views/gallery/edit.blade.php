<h1>Edit Gallery</h1>

<form method="POST" action="{{ route('gallery.update', $gallery->id) }}">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $gallery->title }}" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" required>{{ $gallery->description }}</textarea>
    <br>
    <button type="submit">Update Gallery</button>
</form>
