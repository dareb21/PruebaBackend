<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createNewProduct(){  
        return response()->json(["message"=> "endpoint para crear producto"]);
    }

    public function viewProductById($id){  
        return response()->json(["message"=> "endpoint para ver producto con id ".+$id]);
    }

    public function updateProduct($id){  
        return response()->json(["message"=> "endpoint para actualizar un product"]);
    }

    public function deleteProduct($id){  
        return response()->json(["message"=> "endpoint para eliminar un producto"]);
    }

    public function priceListOfProduct($id)
    {
        return response()->json(["message"=> "endpoint para lista de precios un producto"]);
    }

    public function createNewPriceOfProduct($id)
    {
        return response()->json(["message"=> "endpoint para crear nuevo precio para un producto"]);
    }
}
