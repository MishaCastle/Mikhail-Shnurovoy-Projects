<!DOCTYPE html>
<html>
<head>
    <title>Subscription</title>
</head>
<body>

<h2>Subscriptions</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Organization</th>
        <th>Module</th>
        <th>Date Start</th>
        <th>Date Finish</th>
        <th>Active</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>

    @foreach ($subscriptions as $subscription)
        <tr>
            <td>{{ $subscription->id }}</td>
            <td>{{ $subscription->organization_id }}</td>
            <td>{{ $subscription->module_id }}</td>
            <td>{{ $subscription->date_start }}</td>
            <td>{{ $subscription->date_finish }}</td>
            <td>{{ $subscription->is_active ? 'Yes' : 'No' }}</td>
            <td>{{ $subscription->created_at }}</td>
            <td>{{ $subscription->updated_at }}</td>
        </tr>
    @endforeach
</table>

<hr>

<h3>Search</h3>

<form action="{{ url('/subscription/read') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">
    <input type="number" name="organization_id" placeholder="Organization ID">
    <input type="number" name="module_id" placeholder="Module ID">

    <label>Date Start From</label>
    <input type="date" name="date_start_from">

    <label>Date Start To</label>
    <input type="date" name="date_start_to">

    <label>Date Finish From</label>
    <input type="date" name="date_finish_from">

    <label>Date Finish To</label>
    <input type="date" name="date_finish_to">

    <select name="is_active">
        <option value="">Any</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>

    <label>Created From</label>
    <input type="date" name="createdFrom">

    <label>Created To</label>
    <input type="date" name="createdTo">

    <button type="submit">Search</button>
</form>

<hr>

<h3>Create</h3>

<form action="{{ url('/subscription/create') }}" method="POST">
    @csrf

    <input type="number" name="organization_id" placeholder="Organization ID">
    <input type="number" name="module_id" placeholder="Module ID">

    <label>Date Start</label>
    <input type="date" name="date_start">

    <label>Date Finish</label>
    <input type="date" name="date_finish">

    <select name="is_active">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>

    <button type="submit">Create</button>
</form>

<hr>

<h3>Delete</h3>

<form action="{{ url('/subscription/delete') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">

    <button type="submit">Delete</button>
</form>

<hr>

<h3>Update</h3>

<form action="{{ url('/subscription/update') }}" method="POST">
    @csrf

    <input type="number" name="id" placeholder="ID">
    <input type="number" name="organization_id" placeholder="Organization ID">
    <input type="number" name="module_id" placeholder="Module ID">

    <label>Date Start</label>
    <input type="date" name="date_start">

    <label>Date Finish</label>
    <input type="date" name="date_finish">

    <select name="is_active">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>

    <button type="submit">Update</button>
</form>

</body>
</html>