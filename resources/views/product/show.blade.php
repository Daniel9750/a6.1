<!-- Usamos, como plantilla, la vista layouts.app (/resources/views/layouts/app.blade.php) -->
@extends('layouts.app')                                 

<!-- Inyectamos el texto que contiene el título en el yield "title" -->
@section("title", $viewData["title"])

<!-- Inyectamos el texto con el contenido de la página en el yield "content" -->
@section('content') 
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <img src="{{ asset("/storage/{$viewData['product']['image']}") }}" class="img-fluid rounded">
            <h3>{{ $viewData['product']['name'] }}</h3>
            <p>{{ $viewData['product']['description'] }}</p>
            <p>Precio: ${{ $viewData['product']['price'] }}</p>
            <p>Añadir al carro</p>
        </div>
    </div>
@endsection