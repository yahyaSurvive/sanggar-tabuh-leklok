<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    {{-- @dd($resetLink) --}}
    <h1>Hello, {{ $user->name }}</h1>
    <p>You requested a password reset. Click the button below to reset your password:</p>
    <a href="{{ $resetLink }}" style="background-color: #4CAF50; color: white; padding: 10px 15px; border-radius: 5px;">
        Reset Password
    </a>
    <p>If you didn't request this, please ignore this email.</p>
</body>
</html>
