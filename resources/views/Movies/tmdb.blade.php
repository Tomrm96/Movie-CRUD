<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Search TMDB</h1>

    <a href="{{route('movie.index')}}">HOME</a>

    <div>
        <form action="{{route('movies.search')}}" method="GET">
            <input type="text" placeholder="Search Movies" name="query">
            <input type="submit" placeholder="Search">
        </form>
    </div>
    


    <table border="1">
        <tr>
            <td>Name</td>
            <td>Year</td>
            <td>Genre</td>
            <td>Description</td>
        </tr>

        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie['title'] }}</td>
            <td>{{ $movie['release_date']}}</td>
            <td>{{ implode(', ', $movie['genre_ids']) }}</td>
            <td>{{ $movie['overview'] }}</td>
            <td>
                <form method="POST" action="{{ route('movie.store') }}">
                    @csrf
                    <input type="hidden" name="name" value="{{ $movie['title'] }}">
                    <input type="hidden" name="year" value="{{ $movie['release_date']}}">
                    <input type="hidden" name="genre" value="{{ implode(', ', $movie['genre_ids']) }}">
                    <input type="hidden" name="description" value="{{ $movie['overview'] }}">
                    <button type="submit">ADD</button>
                </form>
            </td>
        </tr>
        @endforeach

</body>
</html>