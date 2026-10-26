<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

@if ($errors->any())
    <div>
        <h3>Errors:</h3>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('/login') }}" method="POST">
    @csrf

    <div>
        <label for="login">Login</label>

        <input
            type="text"
            id="login"
            name="login"
            value="{{ old('login') }}"
            required
        >
    </div>

    <br>

    <div>
        <label for="password">Password</label>

        <input
            type="password"
            id="password"
            name="password"
            required
        >
    </div>

    <br>

    <button type="submit">
        Login
    </button>
</form>

</body>
</html>