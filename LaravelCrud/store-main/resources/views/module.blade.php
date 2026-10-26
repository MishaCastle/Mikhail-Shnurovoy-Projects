<!DOCTYPE html>
<html>
<head>
    <title>Module</title>
</head>
<body>

<h2>Categories</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>price</th>
        <th>create</th>
        <th>update</th>
    </tr>

    @foreach ($module as $modules)
        <tr>
            <td>{{ $modules->id }}</td>
            <td>{{ $modules->name}}</td>
            <td>{{ $modules->price }}</td>
             <td>{{ $modules->created_at}}</td>
            <td>{{ $modules->updated_at }}</td>
        </tr>
    @endforeach
</table>

<hr>

<h3>Фильтр</h3>
<form action="{{ url('/module/read') }}" method="POST">
    @csrf
    <input type="number" name="id" placeholder="ID">
    <input type="text" name="name" placeholder="name">
    <input type="number" name="priceFrom" placeholder="0">
    <input type="number" name="priceTo" placeholder="0">
    <input type="date" name="createdFrom" placeholder="0">
    <input type="date" name="createdTo" placeholder="0">
    <button type="submit">Добавить</button>
</form><h3>Добавить</h3>

<form action="{{ url('/module/create') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="">
    <input type="number" name="price" placeholder="0">
    <button type="submit">Добавить</button>
</form>

<h3>Удалить</h3>
<form action="{{ url('/module/delete') }}" method="POST">
    @csrf
    <input type="number" name="id" placeholder="ID">
    <button type="submit">Удалить</button>
</form>

<h3>Обновить</h3>
<form action="{{ url('/module/update') }}" method="POST">
    @csrf
    <input type="number" name="id" placeholder="ID">
    <input type="text" name="name" placeholder="">
    <input type="number" name="price" placeholder="0">
    <button type="submit">Обновить</button>
</form>

</body>
</html>