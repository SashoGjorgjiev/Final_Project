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

    <div class="login-container mb-5">
        <div class="col-6 offset-3 my-5">
            <div class="row my-5">
                <img src="{{ asset('assets/images/igraliste.png') }}" class="img-fluid" alt="igralishte logo">
            </div>
        </div>
        <div class="mt-5">
            <form method="POST" action="{{ route('user_register_attempt') }}">
                @csrf
                <div class="rounded-input ">
                    <img id="selectedImage" class="mx-auto " src="#" alt="Selected Image">

                    <input type="file" class="rounded-3 border" id="imageInput" accept="image/*" />
                    <label for="imageInput">Одбери слика</label>
                    <div class="file-name">No file chosen</div>
                </div>
                <label for="address" class="form-label my-3 ">Адреса</label>
                <input type="text" id="address" name="address" class="border rounded-3" placeholder="example@example.com">

                <label for="phone" class="form-label  my-3">Телефонски број:</label>
                <input type="text" id="phone" name="phone" class="border rounded-3 mb-3" placeholder="example@example.com">
                <label for="bio" class="form-label  my-3">Биографија</label>
                <textarea name="bio" id="bio" cols="5" rows="5" class="border rounded-3 mb-3" placeholder="example@example.com"></textarea>
                <button type="submit" class="mx-auto mt-3 login">Заврши</button>
            </form>

            <div class="row mt-5">
                <a href="{{ route('user_register') }}" class="text-decoration-none jump text-decoration-underline font-weight-bold">Прескокни</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

    </script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const fileDisplay = document.querySelector('.file-name');
        const selectedImage = document.getElementById('selectedImage');

        imageInput.addEventListener('change', function() {
            const fileName = this.value.split('\\').pop();
            fileDisplay.textContent = fileName || 'No file chosen';

            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
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