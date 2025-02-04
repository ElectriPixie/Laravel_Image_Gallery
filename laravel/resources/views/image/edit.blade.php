<h1>Image Edit</h1>

<form action="{{ route('image.update', $image->id) }}" method="post">
    @csrf
    @method('patch')
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $image->title }}" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description">{{ $image->description }}</textarea>
    <br>
    <label for="image_path">Image Path:</label>
    <input type="text" name="image_path" value="{{ $image->image_path }}" required>
    <br>
    <input type="submit" value="Update Image">
</form>