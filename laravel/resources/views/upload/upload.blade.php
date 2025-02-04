<h1>Upload Image</h1>

<form method="POST" enctype="multipart/form-data" action="{{ route('upload.store') }}">
    @csrf
    {{ method_field('POST') }}
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>