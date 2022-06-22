<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <form action="{{ route('auth_form') }}" method="post">
        @csrf
        <div class="d-flex" style="justify-content: space-between">
            <a href="/" class="previous">&#8249;</a>
            <h2>Авторизация</h2>
            <div></div>
        </div>
        <div>
            <label for="email">Почта</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="email">@</span>
                </div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="name" placeholder="Введите почту" name="email" value="{{ old('email') }}" required autocomplete="email">
                <div class="invalid-feedback">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
        <label for="password">Пароль</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Введите пароль" name="password" required autocomplete="new-password">
            <div class="invalid-feedback">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <br>
        <div class="d-flex" style="justify-content: space-around">
            <button class="btn btn-primary" type="submit" name="sub">Отправить</button>
            <a href="/steam">
                <button class="btn btn-dark" type="button">Через Steam</button>
            </a>
        </div>
    </form>
    <canvas id="canvasf"></canvas>
    <script type="module" src="js/canvas.js"></script>
</body>
</html>