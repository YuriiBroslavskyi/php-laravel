<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}!</h1>
    <p>Thank you for registering with us. We are excited to have you on board.</p>
    <p>
        <a href="{{ url('/') }}">Visit our site</a>
    </p>
</body>
</html>