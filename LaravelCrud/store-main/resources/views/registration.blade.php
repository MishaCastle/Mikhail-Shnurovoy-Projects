<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>

<h2>Registration</h2>

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

<form action="{{ url('/registration') }}" method="POST">
    @csrf

    <div>
        <label for="first_name">First name</label>
        <input
            type="text"
            id="first_name"
            name="first_name"
            value="{{ old('first_name') }}"
            required
        >
    </div>

    <br>

    <div>
        <label for="second_name">Second name</label>
        <input
            type="text"
            id="second_name"
            name="second_name"
            value="{{ old('second_name') }}"
            required
        >
    </div>

    <br>

    <div>
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
        >
    </div>

    <br>

    <div>
        <label for="phone">Phone</label>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone') }}"
        >
    </div>

    <br>

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

    <div>
        <label for="password_confirmation">Confirm password</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
        >
    </div>

    <br>

    <button type="submit">Register</button>
</form>

</body>
</html>