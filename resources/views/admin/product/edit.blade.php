@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
