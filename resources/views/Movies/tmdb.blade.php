<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TMDB</title>
</head>
<body>

<form method="get" action="{{route('movies.search')}}">

    <h1>Find A Movie</h1>
    <div>
        <label for="">Name</label>
        <input type="text" name="query" placeholder="Name" value="{{ request('query') }}">
    </div>


    <div>
        <input type="submit" value="Search">
    </div>

</form>




</body>
</html>
