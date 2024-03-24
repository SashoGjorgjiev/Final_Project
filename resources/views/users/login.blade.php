<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="login-container mb-5">
        <div class="col-6 offset-3 my-5">
            <div class="row my-5">
                <img src="{{ asset('assets/images/igraliste.png') }}" class="img-fluid" alt="igralishte logo">
            </div>
        </div>
        <div class="mt-5">
            <form method="POST" action="{{ route('user_login') }}">
                @csrf

                <label for="email" class="form-label my-3 "> Email адреса:</label>
                <input type="email" id="email" name="email" class="border rounded-3" placeholder="example@example.com" required>

                <label for="password" class="form-label  my-3">Лозинка:</label>
                <input type="password" id="password" name="password" class="border rounded-3 mb-3" placeholder="Your password" required>
                <span>
                    <a href="{{ route('forget-password') }}" class="text-decoration-none ">Ја заборави лозинката?</a>
                </span>
                <button type=" submit" class="mx-auto mt-3 login">Најави се</button>
            </form>

            <div class="text-center my-3">
                <span> или</span>
            </div>
            <div class="my-3 mx-5">
                <a href="{{ route('auth.google') }}" class="loginSocialMedia text-decoration-none text-center pt-1  ">
                    <span><i class="fa-brands fa-google mx-2"></i></span>
                    Најави се преку Google</a>
            </div>
            <div class="my-3 ">
                <a href="{{ route('auth.facebook') }}" class="loginSocialMedia mx-5 text-decoration-none text-center pt-1 ">
                    <span><i class="fa-brands fa-facebook mx-2"></i></span>

                    Најави се преку Facebok</a>
            </div>
        </div>
        <div class="text-center my-3">
            <span> Немаш профил?
                <a href="{{ route('register_user') }}" class="text-decoration-none">Регистрирај се</a>
            </span>

            <footer>
                <div class="pt-5">
                    <p>
                        Сите права задржани @ Игралиште Скопје
                    </p>
                </div>
            </footer>

        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>