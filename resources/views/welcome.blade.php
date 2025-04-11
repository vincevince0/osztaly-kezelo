<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Üdvözöljük!</h1>
        <div class="options">
            <a href="{{ route('login') }}" class="btn btn-login">Bejelentkezés</a>
            <a href="{{ route('dashboard') }}" class="btn btn-student">Folytatás tanulóként</a>
        </div>
    </div>
</body>
</html>
