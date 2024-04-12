<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
</head>
<body>
    <div class="container">
        <h2>Add Supplier</h2>
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address"><br>
            <label for="contact_phone">Contact Phone:</label><br>
            <input type="text" id="contact_phone" name="contact_phone"><br><br>
            <button type="submit">Submit</button>
            <a href="{{ route('suppliers.index') }}"><button type="button">Cancel</button></a>
        </form>
    </div>
</body>
</html>
