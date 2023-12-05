<!DOCTYPE html>
<html lang="en">
<head>
    <title>HTML Links</title>
</head>
<body>
<h1>Product</h1>
<div>Edit a Product</div>
<div>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>

            @endforeach
        </ul>
    @endif
</div>
<form method="post" action="{{route('product.update', ['product' => $product])}}">
    @csrf
    @method('put')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter a product name" value="{{$product->name}}" required />
    </div>
    <div>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" placeholder="Enter product quantity" value="{{$product->quantity}}" required />
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="number" name="price" placeholder="Enter product price" value="{{$product->price}}" required />
    </div>
    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" placeholder="Enter product description" value="{{$product->description}}" required />
    </div>
    <div>
        <input type="submit" value="Update the product" />
    </div>
</form>
</body>

