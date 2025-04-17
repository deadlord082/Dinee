<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
        <p>login</p>
        <form method="POST" action="/authenticate">
            @csrf
    
            <!-- Equivalent to... -->
            <input type="email" name="email" value="test@example.com"/>
            <input type="password" name="password" value="12345678"/>
            <button type="submit">se connecter</button>
        </form>
    </body>
</html>