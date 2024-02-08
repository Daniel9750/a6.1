<!-- Usamos, como plantilla, la vista layouts.app (/resources/views/layouts/app.blade.php) -->
@extends('layouts.app')                                 

<!-- Inyectamos el texto que contiene el título en el yield "title" -->
@section("title", $viewData["title"])

<!-- Inyectamos el texto con el contenido de la página en el yield "content" -->
@section('content') 
    <div class="row">
        @foreach($viewData["products"] as $product)
            <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset("/storage/" . $product['image']) }}" class="img-fluid rounded">

                <h3>{{ $product['name'] }}</h3>
                <p>{{ $product['description'] }}</p>
                <p>Precio: ${{ $product['price'] }}</p>
                <a href="{{ route('product.show', ['id' => $product['id']]) }}"  class="btn btn-primary">Ver detalles</a>
                <br><br>
                <a href="{{ route('admin.product.edit', ['id' => $product['id']]) }}" class="btn btn-primary">Editar producto</a>
                <br><br>
                <form action="{{ route('admin.product.destroy', ['id' => $product['id']]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Borrar producto</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection

