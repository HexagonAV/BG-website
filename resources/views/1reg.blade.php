<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="{{ route('reg_form') }}" method="post">
        @csrf
        <h1>Регистрация</h1>
        <div>
            @error('name')
                <strong>{{ $message }}</strong>
            @enderror
            <input id="name" type="text" placeholder="Имя" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>

        <div>
            @error('email')
                <strong>{{ $message }}</strong>
            @enderror
            <input id="email" type="email" placeholder="Почта" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
        
        <div>
            @error('password')
                <strong>{{ $message }}</strong>
            @enderror
            <input id="password" type="password" placeholder="Пароль" name="password" required>
        </div>

        <input id="password-confirm" type="password" placeholder="Повтор пароля" name="password_confirmation" required>
        <div class="bottom">
            <input type="submit" name="sub" value="Зарегестрироваться">
            <a href="/">На главную</a>
        </div>
    </form>
    <canvas id="canvasf"></canvas>
    <script type="module" src="js/canvas.js"></script>
</body>
</html>