<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Movie</h1>

    <form method="post" action="{{route('movie.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name">
        </div>

        <div>
            <label for="">Genre</label>
            <input type="text" name="genre" placeholder="Genre">
        </div>

        <div>
            <label for="">Year</label>
            <input type="text" name="year" placeholder="Year">
        </div>

        <div>
            <input type="submit" value="Save a New Movie">
        </div>

    </form>
</body>
</html>