<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
    Hay que borrar el "private products" y cambiar los 
    métodos para cargar los datos de la base de datos
    */ 

    private $products = [
        1 => ["id" => 1, "name" => "Producto 1", "description" => "Descripción del producto 1", "image" => "game.png", "price" => 199.99],
        2 => ["id" => 2, "name" => "Producto 2", "description" => "Descripción del producto 2", "image" => "safe.png", "price" => 29.99],
        3 => ["id" => 3, "name" => "Producto 3", "description" => "Descripción del producto 3", "image" => "submarine.png", "price" => 2999.99],
        // Puedes añadir más productos
    ];

    public function index() {
        $viewData = [];
        $viewData["title"] = "Listado de productos - Tienda online";
        $viewData["products"] = $this->products;

        return view("product.index")->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        
        // Verifica si el producto existe
        if (isset($this->products[$id])) {
            $product = $this->products[$id];
    
            $viewData["title"] = $product["name"] . " - Detalles del producto";
            $viewData["product"] = $product;
    
            return view("product.show")->with("viewData", $viewData);
        } else {
            // En caso de que no exista, se produce un error.
            abort(404, 'Producto no encontrado');
        }
    }
}
