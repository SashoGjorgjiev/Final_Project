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
            <form method="POST" action="{{ route('user_register_proceed') }}" id="registrationForm">
                @csrf

                <!-- Step 1: User Details -->
                <div id="step1">
                    <!-- Form elements for step 1 -->
                    <div class="d-flex flex-column">
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

                    <input type="hidden" name="step" value="1">
                    <div class="text-center">
                        <button type="button" onclick="showStep(2)" class="mx-auto mt-3 login">Регистрирај се</button>
                    </div>
                    <div class="text-center my-3">
                        <span> или</span>
                    </div>
                    <div class="my-3 mx-5">
                        <a href="{{ route('auth.google') }}" class="loginSocialMedia text-decoration-none text-center pt-1">
                            <span class="p-1"><i class="fa-brands fa-google mx-auto"></i></span>
                            Регистрирај се преку Google</a>
                    </div>
                    <div class="my-3 ">
                        <a href="{{ route('auth.facebook') }}" class="loginSocialMedia mx-5 text-decoration-none text-center pt-1 ">
                            <span><i class="fa-brands fa-facebook mx-auto"></i></span>
                            Регистрирај се преку Facebook</a>
                    </div>
                    <div class="text-center my-3">
                        <span> Веќе имаш профил?
                            <a href="{{ route('login') }}" class="text-decoration-none">Логирај се</a>
                        </span>
                    </div>
                    <footer>
                        <div class="pt-5">
                            <p>Сите права задржани @ Игралиште Скопје</p>
                        </div>
                    </footer>
                </div>

                <!-- Step 2: Additional Details -->
                <div id="step2" style="display: none;">
                    <div class="d-flex flex-column">
                        <label for="name" class="form-label my-3">Име</label>
                        <input type="text" id="name" name="name" class="border rounded-3" placeholder="example@example.com">

                        <label for="last_name" class="form-label my-3">Презиме:</label>
                        <input type="text" id="last_name" name="last_name" class="border rounded-3 mb-3" placeholder="example@example.com">

                        <label for="email" class="form-label my-3">Емаил адреса</label>
                        <input type="email" id="emailStep2" name="email" class="border rounded-3">

                        <label for="password" class="form-label my-3">Лозинка:</label>
                        <input type="password" id="passwordStep2" name="password" class="border rounded-3 mb-3">

                        <label for="password" class="form-label my-3">Повтори лозинка</label>
                        <input type="password" class="border rounded-3 mb-3">
                        <span class="checkCircle">
                            <i class="fa-solid fa-circle-check"></i>
                            Испраќај ми известувања за нови зделки и промоции.
                        </span>
                    </div>
                    <input type="hidden" name="step" value="2">
                    <button type="button" onclick="showStep(3)" class="mx-auto mt-3 login">Регистрирај се</button>
                </div>

                <!-- Step 3: Finalize Registration -->
                <div id="step3" style="display: none;">
                    <div class="d-flex flex-column">
                        <div class="rounded-input">
                            <img id="selectedImage" class="mx-auto" src="#" alt="Selected Image">
                            <input type="file" class="rounded-3 border" name="image" id="imageInput" accept="image/*" />
                            <label for="imageInput">Одбери слика</label>
                            <div class="file-name">No file chosen</div>
                        </div>
                        <label for="address" class="form-label my-3">Адреса</label>
                        <input type="text" id="address" name="address" class="border rounded-3" placeholder="example@example.com">

                        <label for="phone" class="form-label my-3">Телефонски број:</label>
                        <input type="text" id="phone" name="phone" class="border rounded-3 mb-3" placeholder="example@example.com">
                        <label for="bio" class="form-label my-3">Биографија</label>
                        <textarea name="bio" id="bio" cols="5" rows="5" class="border rounded-3 mb-3" placeholder="example@example.com"></textarea>
                    </div>
                    <input type="hidden" name="step" value="3">
                    <button type="submit" class="e">Заврши</button>
                    <div class="row mt-5">
                        <a href="{{ route('user_register_proceed') }}" class="text-decoration-none jump text-decoration-underline font-weight-bold">Прескокни</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function showStep(step) {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step3').style.display = 'none';

            document.getElementById('step' + step).style.display = 'block';

            if (step === 2) {
                let emailStep1Value = document.getElementById('emailStep1').value;
                document.getElementById('emailStep2').value = emailStep1Value;

                let passwordStep1Value = document.getElementById('passwordStep1').value;
                document.getElementById('passwordStep2').value = passwordStep1Value;
            }
        }

        let imageInput = document.getElementById('imageInput');
        let fileDisplay = document.querySelector('.file-name');
        let selectedImage = document.getElementById('selectedImage');

        imageInput.addEventListener('change', function() {
            let fileName = this.value.split('\\').pop();
            fileDisplay.textContent = fileName || 'No file chosen';

            let file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                selectedImage.src = '#';
            }
        });
    </script>
</body>

</html>