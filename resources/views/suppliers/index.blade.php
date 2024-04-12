<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Suppliers</title>
    <!-- Agrega aquí tus enlaces a los estilos CSS si los tienes -->
    <style>
        /* Estilos CSS para la tabla, puedes personalizarlos según tus necesidades */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>List of Suppliers</h2>
        <a href="{{ route('suppliers.create') }}" style="margin-bottom: 10px; display: block;">Add Supplier</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->contact_phone }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}"><button type="button">Edit</button></a>
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
