<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    @if($errors->any())
        {{$errors->first()}}
    @endif

    <form action="{{ route('admin.login.store') }}" method="POST">
        @csrf

        <div>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <input type="password" name="password" placeholder="Пароль">
        </div>

        <button type="submit">Войти</button>

    </form>
</body>

</html>
