<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Movie</h1>


    <form method="post" action="{{route('movie.update', ['movie' => $movie])}}">
        @csrf
        @method('put')
        
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$movie->name}}">
        </div>

        <div>
            <label for="">Genre</label>
            <input type="text" name="genre" placeholder="Genre" value="{{$movie->genre}}">
        </div>

        <div>
            <label for="">Year</label>
            <input type="text" name="year" placeholder="Year" value="{{$movie->year}}">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>

    </form>
</body>
</html>