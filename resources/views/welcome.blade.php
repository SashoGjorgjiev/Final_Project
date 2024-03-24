<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bgPink">

    <div class="container  ">
        <div class="col-6 offset-3  my-5">
            <div class="row my-5">
                <img src="{{ asset('assets/images/igraliste.png') }}" class="img-fluid  w-sm-50 w-75 mx-auto mb-5" alt="igralishte logo">
            </div>
        </div>
        <div class="col-6 offset-3 mt-5">
            <form action="{{ route('admin.authenticate') }}" method="post">
                @csrf
                <div class="d-flex flex-column mt-5">
                    <label for="email" class="form-label my-3">Email адреса:</label>
                    <input type="email" id="emailStep1" name="email" class="border rounded-3" placeholder="example@example.com">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <label for="password" class="form-label my-3">Лозинка:</label>
                    <input type="password" id="passwordStep1" name="password" class="border rounded-3 mb-3" placeholder="Your password">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <span class="text-left">
                    <a href="{{ route('forget-password') }}" class="text-decoration-underline ">Ја заборави лозинката?</a>
                </span>
                <button type="submit" class="btn login my-3 mx-auto ">Логирај се</button>
            </form>

            <footer>
                <div class="pt-5 text-center ">
                    <p>Сите права задржани @ Игралиште Скопје</p>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>