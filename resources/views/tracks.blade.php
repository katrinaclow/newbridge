<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracks</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a062562745.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="content">
    <h1>Tracks</h1>
    @foreach ($tracks as $track)
        <div class="track">
            <audio controls>
                <source src="{{ $track->url }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    @endforeach
</div>
</body>
</html>
