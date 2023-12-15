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

        <p class="text-center bg-success fs-1 text-light">All Products</p>
        <p class="text-center">
            <a href="{{ route('product.storeForm') }}" class="btn btn-info">Add Product</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
        </p>

        @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-dark text-center table-striped">

            <tr>
                <th>SI</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>price</th>
                <th>Action</th>
            </tr>

            @php
            $i=1;
            @endphp

            @foreach ($products as $product)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{ route('product.sellForm', ['id' => $product->id]) }}" class="btn btn-success">Sell Product</a>
                    <a href="{{ route('product.updateForm', ['id' => $product->id]) }}" class="btn btn-primary">Edit Product</a>
                </td>
            </tr>

            @endforeach

        </table>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>