<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <div class="container">
        <h2>Add Category</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <button type="submit">Submit</button>
            <a href="{{ route('categories.index') }}"><button type="button">Cancel</button></a>
        </form>
    </div>
</body>
</html>
