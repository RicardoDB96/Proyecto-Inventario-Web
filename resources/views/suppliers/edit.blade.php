<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
</head>
<body>
    <div class="container">
        <h2>Edit Supplier</h2>
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="{{ $supplier->name }}"><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="{{ $supplier->address }}"><br>
            <label for="contact_phone">Contact Phone:</label><br>
            <input type="text" id="contact_phone" name="contact_phone" value="{{ $supplier->contact_phone }}"><br><br>
            <button type="submit">Update</button>
            <a href="{{ route('suppliers.index') }}"><button type="button">Cancel</button></a>
        </form>
    </div>
</body>
</html>
