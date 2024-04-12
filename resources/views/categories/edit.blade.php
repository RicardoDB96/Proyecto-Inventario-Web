<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <div class="container">
        <h2>Edit Category</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="{{ $category->name }}"><br><br>
            <button type="submit">Update</button>
            <a href="{{ route('categories.index') }}"><button type="button">Cancel</button></a>
        </form>
    </div>
</body>
</html>
