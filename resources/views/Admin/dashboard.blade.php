<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @yield('content')
    <div id="sidebar">
        @if(Auth::check())
        <div id="profile">
            <p>
                <span class="mr-2">{{ Auth::user()->name }}</span>
                <span>{{ Auth::user()->last_name }}</span>
            </p>
            <p>{{ Auth::user()->email }}</p>

            <img src="{{ Auth::user()->image }}" alt="Profile Image">
        </div>
        @else
        <p>User not logged in</p>
        @endif
        <div id="menu">
            <a href="#">Vintage Obleka</a>
            <a href="#">Popusti</a>
            <a href="#">Profil Brendovi</a>
        </div>
    </div>

    <button id="logout">Odjavi se</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>