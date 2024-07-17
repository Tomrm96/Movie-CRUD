<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Movie</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Edit</th>
            </tr>
            @foreach($movies as $movie)
                <tr>
                    <td>{{$movie->id}}</td>
                    <td>{{$movie->name}}</td>
                    <td>{{$movie->genre}}</td>
                    <td>{{$movie->year}}</td>
                    <td>
                        <a href="{{route('movie.edit', ['movie' => $movie ])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>