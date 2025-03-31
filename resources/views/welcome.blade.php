<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Üdvözöljük!</h1>
        <div class="options">
            <a href="{{ route('login') }}" class="btn">Bejelentkezés</a>
            <a href="{{ route('register') }}" class="btn">Regisztráció</a>
            <a href="{{ route('dashboard') }}" class="btn guest-btn">Folytatás bejelentkezés nélkül</a>
        </div>
    </div>
</body>
</html>
