<!DOCTYPE html>
<html lang="en">
<head>
    <title>HTML Links</title>
</head>
<body>
    <h1>Product</h1>
    <div>
        <a href="{{ route('product.create') }}">Create a new product</a>
    </div>
    <div>
        @if(session() -> has('success'))
            <div>
                {{ session() -> get('success') }}
            </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('product.destroy', ['product' => $product])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete"/>
{{--                        <a href="{{ route('product.delete', ['product' => $product]) }}">Delete</a>--}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
