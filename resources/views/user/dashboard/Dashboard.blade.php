<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
</head>
<body>
    <h1>Selamat datang, {{ auth('user')->user()->name }}</h1>
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
