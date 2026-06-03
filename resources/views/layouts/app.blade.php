<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS Film App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('categories.index') }}">
                FilmApp
            </a>
        </div>

        <a href="{{ route('films.index') }}" class="btn btn-outline-light btn-sm">
            Film
        </a>
        
    </nav>

    <main>
        @yield('content')
    </main>
</body>

</html>
