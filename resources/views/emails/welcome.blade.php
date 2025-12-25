<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}!</h1>
    <p>Please check this pdf file attached to the email.</p>
    <p>
        <a href="{{ url('/') }}">Visit our site</a>
    </p>
</body>
</html>