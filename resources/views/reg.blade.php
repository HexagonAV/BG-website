<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <form action="{{ route('reg_form') }}" method="post">
        <div class="d-flex" style="justify-content: space-between">
            <a href="/" class="previous">&#8249;</a>
            <h2>Регистрация</h2>
            <div></div>
        </div>
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="name">Имя</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Введите имя" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="invalid-feedback">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            </div>
            <div class="form-group col-md-4">
            <label for="email">Почта</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="email">@</span>
                </div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Введите почту" name="email" value="{{ old('email') }}" required autocomplete="email">
                <div class="invalid-feedback">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="password">Пароль</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Введите пароль" name="password" required autocomplete="new-password">
            <div class="invalid-feedback">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            </div>
            <div class="form-group col-md-4">
            <label for="password-confirm">Повтор пароля</label>
            <input type="password" class="form-control" id="password-confirm" placeholder="Повторите пароль" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="check" required>
            <label class="form-check-label" for="check">
                Согласен с условиями
            </label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit" name="sub">Отправить</button>
        </div>
    </form>
    <canvas id="canvasf"></canvas>
    <script type="module" src="js/canvas.js"></script>
</body>
</html>