<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Edit </title>
    <!-- Add Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/main_1.css') }}" rel="stylesheet">

</head>
<body><div class="container">
    <h1>Edit product</h1>
  {{-- // DataProject/products/product --}}
    <!-- Display validation errors -->
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <!-- Form for editing category -->
    <form method="POST" action="{{ route('DataProject.product.update') }}">
        @csrf
        <div class="form-group">
            <input name="id" value="{{ $product->id }}" type="hidden">

            <label for="name">product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="form-group">
            <label for="name">product Desc</label>
            <input type="text" name="desc" id="desc" class="form-control" value="{{ old('name', $product->desc) }}" required>
        </div>
        <div class="form-group">
            <label for="name">product Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="form-group">
            <label for="name">product Qun</label>
            <input type="text" name="Qun" id="" class="form-control" value="{{ old('qun', $product->qun) }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update product</button>
    </form>

    <a href="{{ route('DataProject.product.index') }}" class="btn btn-secondary mt-3">Back to products</a>
</div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
