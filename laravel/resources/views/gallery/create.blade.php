<h1>Create Gallery</h1>

<form method="POST" action="{{ url('/gallery/store') }}">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <br>
    <button type="submit">Create Gallery</button>
</form>