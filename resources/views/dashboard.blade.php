<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div id="sidebar" class="collapsed col-md-2 col-sm-2">
        <div id="profile">
            <div class="d-flex align-items-start">
                <img src="{{ Auth::user()->image }}" alt="Profile Image" class="mr-3">
                <div class="text-dark font-weight-bold removeText">
                    <p class="fs-bold mt-4 mb-1">
                        <span>{{ Auth::user()->name }}</span>
                        <span>{{ Auth::user()->last_name }}</span>
                    </p>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <button id="toggleSidebar">X</button>
            </div>
        </div>
        <div id="menu">
            <a href="{{ route('admin.vintage_obleka') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-flower">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M12 2a3 3 0 0 1 3 3c0 .562 -.259 1.442 -.776 2.64l-.724 1.36l1.76 -1.893c.499 -.6 .922 -1 1.27 -1.205a2.968 2.968 0 0 1 4.07 1.099a3.011 3.011 0 0 1 -1.09 4.098c-.374 .217 -.99 .396 -1.846 .535l-2.664 .366l2.4 .326c1 .145 1.698 .337 2.11 .576a3.011 3.011 0 0 1 1.09 4.098a2.968 2.968 0 0 1 -4.07 1.098c-.348 -.202 -.771 -.604 -1.27 -1.205l-1.76 -1.893l.724 1.36c.516 1.199 .776 2.079 .776 2.64a3 3 0 0 1 -6 0c0 -.562 .259 -1.442 .776 -2.64l.724 -1.36l-1.76 1.893c-.499 .601 -.922 1 -1.27 1.205a2.968 2.968 0 0 1 -4.07 -1.098a3.011 3.011 0 0 1 1.09 -4.098c.374 -.218 .99 -.396 1.846 -.536l2.664 -.366l-2.4 -.325c-1 -.145 -1.698 -.337 -2.11 -.576a3.011 3.011 0 0 1 -1.09 -4.099a2.968 2.968 0 0 1 4.07 -1.099c.348 .203 .771 .604 1.27 1.205l1.76 1.894c-1 -2.292 -1.5 -3.625 -1.5 -4a3 3 0 0 1 3 -3z" />
                </svg>
                <span class="removeText">Vintage Obleka</span>
            </a>


            <a href="{{ route('admin.discount') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-rosette-discount">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 15l6 -6" />
                    <circle cx="9.5" cy="9.5" r=".5" fill="currentColor" />
                    <circle cx="14.5" cy="14.5" r=".5" fill="currentColor" />
                    <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1" />
                </svg>
                <span class="removeText">Попусти / промо</span> </a>

            </a>
            <a href="{{ route('admin.brand') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-cake">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M20.84 12c0 2.05 .985 3.225 -.04 5c-1.026 1.775 -2.537 1.51 -4.314 2.534c-1.776 1.026 -2.302 2.466 -4.353 2.466c-2.051 0 -2.576 -1.441 -4.353 -2.466c-1.776 -1.024 -3.288 -.759 -4.314 -2.534c-1.025 -1.775 -.04 -2.95 -.04 -5s-.985 -3.225 .04 -5c1.026 -1.775 2.537 -1.51 4.314 -2.534c1.776 -1.026 2.302 -2.466 4.353 -2.466s2.577 1.441 4.353 2.466c1.776 1.024 3.288 .759 4.313 2.534c1.026 1.775 .04 2.95 .04 5z" />
                </svg> <span class="removeText">Брендови</span> </a>

            </a>
            <a href="{{ route('admin.profile') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                </svg> <span class="removeText">Профил</span> </a>
        </div>
    </div>
    <div class="container-fluid mt-2 offset-1 col-sm-6  col-md-10 ">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6">
                @yield('content')
            </div>
        </div>
    </div>
    <a href="{{ route('admin.logout') }}" class="text-dark text-decoration-none" id="logout">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span class="removeText">Одјави се</span></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $xBtn = document.getElementById("toggleSidebar").addEventListener("click", function() {
                document.getElementById("sidebar").classList.toggle("collapsed");
                document.getElementById("toggleSidebar").classList.toggle("d-none");
                let removeTextElements = document.querySelectorAll('.removeText');
                removeTextElements.forEach(function(element) {
                    element.textContent = '';
                });
            });

        });
    </script>
</body>

</html>