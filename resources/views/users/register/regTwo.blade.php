<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="login-container-register mb-5">
        <div class="col-6 offset-3 my-5">
            <div class="row my-5">
                <img src="{{ asset('assets/images/igraliste.png') }}" class="img-fluid" alt="igralishte logo">
            </div>
        </div>
        <div class="mt-5">
            <form method="POST" action="{{ route('user_register_last') }}">
                @csrf
                <label for="name" class="form-label my-3 "> Име</label>
                <input type="text" id="name" name="name" class="border rounded-3" placeholder="example@example.com">

                <label for="surname" class="form-label  my-3">Презиме:</label>
                <input type="text" id="surname" name="surname" class="border rounded-3 mb-3" placeholder="example@example.com">

                <label for="email" class="form-label my-3 "> Емаил адреса</label>
                <input type="email" id="email" name="email" class="border rounded-3" value="{{ old('email')}}" placeholder="example@example.com">

                <label for="password" class="form-label  my-3">Лозинка:</label>
                <input type="password" id="password" name="password" class="border rounded-3 mb-3" value=" {{ old('password')}}" placeholder="Your password">

                <label for="password" class="form-label  my-3">Повтори лозинка</label>
                <input type="password" id="password" name="password" class="border rounded-3 mb-3" placeholder="Your password">
                <span class="checkCircle">
                    <i class="fa-solid fa-circle-check"></i>
                    Испраќај ми известувања за нови зделки и промоции. </span>



                <button type=" submit" class="mx-auto mt-3 login"> Регистрирај се</button>
            </form>



        </div>


        <footer class="mb-5 mt-2 text-center checkCircle">
            <p>
                Со вашата регистрација, се согласувате со <strong>
                    Правилата и Условите
                </strong> за кориснички сајтови. </p>
        </footer>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>