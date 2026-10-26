<!DOCTYPE html>
<html>
<head>
    <title>Organization</title>
</head>
<body>

<h2>Organizations</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Post Code</th>
        <th>Country</th>
        <th>City</th>
        <th>Street</th>
        <th>Number</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>

    @foreach ($organizations as $organization)
        <tr>
            <td>{{ $organization->id }}</td>
            <td>{{ $organization->name }}</td>
            <td>{{ $organization->post_code }}</td>
            <td>{{ $organization->country }}</td>
            <td>{{ $organization->city }}</td>
            <td>{{ $organization->street }}</td>
            <td>{{ $organization->number }}</td>
            <td>{{ $organization->created_at }}</td>
            <td>{{ $organization->updated_at }}</td>
        </tr>
    @endforeach
</table>

<hr>

<h3>Search</h3>

<form action="{{ url('/organization/read') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="post_code" placeholder="Post Code">
    <input type="text" name="country" placeholder="Country">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="street" placeholder="Street">
    <input type="text" name="number" placeholder="Number">

    <input type="date" name="createdFrom">
    <input type="date" name="createdTo">

    <button type="submit">Search</button>
</form>

<hr>

<h3>Create</h3>

<form action="{{ url('/organization/create') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <input type="text" name="post_code" placeholder="Post Code">
    <input type="text" name="country" placeholder="Country">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="street" placeholder="Street">
    <input type="text" name="number" placeholder="Number">

    <button type="submit">Create</button>
</form>

<hr>

<h3>Delete</h3>

<form action="{{ url('/organization/delete') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">

    <button type="submit">Delete</button>
</form>

<hr>

<h3>Update</h3>

<form action="{{ url('/organization/update') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="post_code" placeholder="Post Code">
    <input type="text" name="country" placeholder="Country">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="street" placeholder="Street">
    <input type="text" name="number" placeholder="Number">

    <button type="submit">Update</button>
</form>

</body>
</html>