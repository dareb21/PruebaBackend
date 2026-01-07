<?php

namespace App\Services;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\DB; 

class ProductServices
{
    public function createNewProduct(array $newProductBody){

    return DB::transaction(function () use ($newProductBody) {
        $newProduct= Product::create($newProductBody);

        ProductPrice::create([
            "product_id"=>$newProduct->id,
            "currency_id"=>$newProductBody["currency_id"],
            "price"=>$newProductBody["price"], 
        ]);
        return $newProductBody;  
        });      
    }

    public function viewAllProduct(){
        return Product::paginate(10);
    }

    public function viewProductById($productId){  
        $foundProduct = Product::where("id",$productId)->first();
        if (!$foundProduct)
            {
                return "Producto no encontrado";
            }
        return $foundProduct;
    }

    public function updateProduct($updatedProductBody,$productId){  
        $foundProduct = Product::where("id",$productId)->exists();
        if (!$foundProduct)
            {
                return [];
            } 
        $updatedProduct = Product::where("id",$productId)->update($updatedProductBody);
    return $updatedProductBody;
    }

    public function deleteProduct($productId){  
        $foundProduct = Product::find($productId);
        if (!$foundProduct)
            {
                return "No se encontro ningun producto";
            } 
            
            $foundProduct->delete();

        return "Eliminado con exito";
    }

    public function priceListOfProduct($producetId)
    {
        
        $x= Product::with("prices.currency")->find($producetId);
        return $x;
        $name =$x->name;
        return $x->prices;
        $price =$x->prices->price;
        $sym=$x->prices->currency->symbol;
        return [$name,$price,$sym];

    }
    
    public function createNewPriceOfProduct($productId,$validatedPriceProduct)
    {
         
        $foundProduct = Product::where("id",$productId)->exists();
        if (!$foundProduct)
            {
                return "No se encontro ningun producto con este id";
            } 
            ;
        $newPriceProduct = ProductPrice::create([
            "product_id"=>$productId,
            "currency_id"=>$validatedPriceProduct["currency_id"],
            "price"=>$validatedPriceProduct["price"],             
        ]);
        
        return "Precio ingresado con exito";
    }
}
