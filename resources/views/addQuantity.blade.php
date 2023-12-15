<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asl store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <h1 class="text-center text-light bg-success p-2">Add Quantity</h1>
        <a href="{{ route('product') }}" class="mb-2 text-center btn btn-success">Back</a>

        <form action="{{ route('product.update') }}" method="post">

            @csrf

            <input type="text" name="id" value="{{$product->id}}" hidden>

            <label for="name">Product Name:</label>
            <input type="text" name="name" value="{{$product->name}}" readonly="readonly" required>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="{{$product->quantity}}" required>

            <button type="submit" class="btn btn-primary">Update Product</button>

        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>