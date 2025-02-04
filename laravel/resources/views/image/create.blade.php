<h1>Image Create</h1>

<form action="{{ route('image.store') }}" method="post">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description"></textarea>
    <br>
    <label for="image_path">Image Path:</label>
    <input type="text" name="image_path" required>
    <br>
    <input type="submit" value="Create Image">
</form>
