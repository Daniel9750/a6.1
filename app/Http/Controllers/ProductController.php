<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{

    public function index() {
        $viewData = [];
        $viewData["title"] = "Listado de productos - Tienda online";
        $viewData["products"] = Product::all();

        return view("product.index")->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        
        // Verifica si el producto existe
        if (Product::find($id)) {
            $product = Product::find($id);
    
            $viewData["title"] = $product["name"] . " - Detalles del producto";
            $viewData["product"] = $product;
    
            return view("product.show")->with("viewData", $viewData);
        } else {
            // En caso de que no exista, se produce un error.
            abort(404, 'Producto no encontrado');
        }
    }
}
