<form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="track" required>
    <button type="submit">Upload</button>
</form>
