<?php
namespace App\Services;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductServices
{
    private function validateProductExists($productId)
    {
        $productFound=Product::find($productId);
        if (!$productFound)
            {
              throw new HttpResponseException(response()->json(['message' => 'Producto NO encontrado'], 404));
            }
        return $productFound;    
    }
    

    public function createNewProduct(array $newProductBody){

    return DB::transaction(function () use ($newProductBody) {
    try {
            $newProduct= Product::create($newProductBody);
        } 
    catch (\Throwable $th) {
          throw new HttpResponseException(  response()->json([
                'error' => 'Producto duplicado',
                'message' => 'No se puede crear este producto ya que existe uno con un nombre similar.',
            ], 400));   
         }
        

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
        $foundProduct = $this->validateProductExists($productId);
        return $foundProduct;   
    }

    public function updateProduct($updatedProductBody,$productId){  
        $foundProduct = $this->validateProductExists($productId);
        $updatedProduct = Product::where("id",$productId)->update($updatedProductBody);
    return $updatedProductBody;
    }

    public function deleteProduct($productId){  
        $foundProduct = $this->validateProductExists($productId);
        $foundProduct->delete();
    }

    public function priceListOfProduct($productId)
    {
        $priceListOfProduct = Product::with("prices.currency")->find($productId);
        if (!$priceListOfProduct)
            {
                    throw new HttpResponseException(response()->json(['message' => 'Producto NO encontrado'], 404));
            }
        $listOfPrices = [
        'name' => $priceListOfProduct->name,
        'prices' => []
    ];

    foreach ($priceListOfProduct->prices as $price) {
        $listOfPrices['prices'][] = [
            'price' => $price->price,
            'currency' => $price->currency->symbol,
            'currency_id' => $price->currency->id
        ];
    }
        return $listOfPrices;

    }
    
    public function createNewPriceOfProduct($productId,$validatedPriceProduct)
    {
        $foundProduct = $this->validateProductExists($productId);
        try {
            $newPriceProduct = ProductPrice::create([
            "product_id"=>$productId,
            "currency_id"=>$validatedPriceProduct["currency_id"],
            "price"=>$validatedPriceProduct["price"],             
        ]);
        } catch (\Throwable $th) {    
            throw new HttpResponseException(  response()->json([
                'error' => 'Precio duplicado',
                'message' => 'No se puede crear un precio porque ya existe un registro para este producto y moneda',
            ], 400));
        }
        
        
        
  return $validatedPriceProduct["price"];
    }
}
