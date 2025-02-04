<h1>Image Create</h1>

<form action="{{ url('image/' . $gallery->id . '/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description"></textarea>
    <br>
    <label for="image_path">Select Image:</label>
    <input type="file" name="image_path" required>
    <br>
    <input type="submit" value="Create Image">
</form>
