<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>

<h2>Users</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Second name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Login</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->second_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->login }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    @endforeach
</table>

<hr>

<h3>Search</h3>

<form action="{{ url('/user/read') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">
    <input type="text" name="first_name" placeholder="First name">
    <input type="text" name="second_name" placeholder="Second name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="phone" placeholder="Phone">
    <input type="text" name="login" placeholder="Login">

    <input type="date" name="createdFrom">
    <input type="date" name="createdTo">

    <button type="submit">Search</button>
</form>

<hr>

<h3>Create</h3>

<form action="{{ url('/user/create') }}" method="POST">
    @csrf

    <input type="text" name="first_name" placeholder="First name">
    <input type="text" name="second_name" placeholder="Second name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="phone" placeholder="Phone">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="Password">

    <button type="submit">Create</button>
</form>

<hr>

<h3>Delete</h3>

<form action="{{ url('/user/delete') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">

    <button type="submit">Delete</button>
</form>

<hr>

<h3>Update</h3>

<form action="{{ url('/user/update') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">
    <input type="text" name="first_name" placeholder="First name">
    <input type="text" name="second_name" placeholder="Second name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="phone" placeholder="Phone">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="New password">

    <button type="submit">Update</button>
</form>

</body>
</html>