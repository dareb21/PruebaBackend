<?php
namespace App\Services;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        return $newProduct;  
        });      
    }

    public function viewAllProduct(){
        return Product::get(); //Se realizo de esta manera por temas de prueba, en produccion se usaria paginacion.
    }

    public function viewProductById($productId){  
        $foundProduct = Product::findOrFail($productId);
        return $foundProduct;
    }

    public function updateProduct($updatedProductBody,$productId){  
        $foundProduct = Product::findOrFail($productId);

        $updatedProduct = Product::where("id",$productId)->update($updatedProductBody);
    return $updatedProductBody;
    }

    public function deleteProduct($productId){  
        $foundProduct = Product::findOrFail($productId);
         
            $foundProduct->delete();
  return true;
}

    public function priceListOfProduct($productId)
    {
        $priceListOfProduct = Product::with("prices.currency")->findOrFail($productId);
        if (!$priceListOfProduct)
            {
                 throw new ModelNotFoundException('Product not found');
            }
        $listOfPrices = [
        'name' => $priceListOfProduct->name,
        'prices' => []
    ];

    foreach ($priceListOfProduct->prices as $price) {
        $listOfPrices['prices'][] = [
            'amount' => $price->price,
            'currency' => $price->currency->symbol
        ];
    }
        return $listOfPrices;

    }
    
    public function createNewPriceOfProduct($productId,$validatedPriceProduct)
    {
         
        $foundProduct = Product::findOrFail($productId);
        $newPriceProduct = ProductPrice::create([
            "product_id"=>$productId,
            "currency_id"=>$validatedPriceProduct["currency_id"],
            "price"=>$validatedPriceProduct["price"],             
        ]);
        
  return true;
    }
}
