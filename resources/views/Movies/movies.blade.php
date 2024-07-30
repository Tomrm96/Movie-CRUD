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

        <nav>
            <button type="text"><a href="{{route('movie.tmdb')}}">Search TMDB</a></a></button>
            <button type="text"><a href="{{route('movie.create')}}">Manually Add a Movie</a></a></button>                                  
            <button type="text"><a href="{{route('100.tmdb')}}">Top 100</a></button>
        </nav>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Description</th>
            </tr>
            @foreach($movies as $movie)
                <tr>
                    <td>{{$movie->id}}</td>
                    <td>{{$movie->name}}</td>
                    <td>{{$movie->genre}}</td>
                    <td>{{$movie->year}}</td>
                    <td>{{$movie->description}}</td>
                    <td>
                        <a href="{{route('movie.edit', ['movie' => $movie ])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('movie.destroy', ['movie' => $movie])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
