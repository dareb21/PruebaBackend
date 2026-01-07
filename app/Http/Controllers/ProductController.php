<?php

namespace App\Http\Controllers;

use App\Services\ProductServices;
use App\Http\Requests\Products\CreateNewProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Requests\PriceProducts\CreateNewPriceProductRequest;


class ProductController extends Controller
{
    public function __construct(private ProductServices $productServices ) {}
    
    public function createNewProduct(CreateNewProductRequest $request){  
        $validatedNewProduct = $request->validated();
        $newProduct = $this->productServices->createNewProduct($validatedNewProduct); 
    
    return response()->json([
        'message' => 'Producto creado correctamente', 
        'product' => $newProduct,
        ], 201);
    }

    public function viewAllProducts(){
        $allProducts = $this->productServices->viewAllProduct();
        return response()->json(["products" =>$allProducts]);
    }

    public function viewProductById($productId){  
        $productFound = $this->productServices->viewProductById($productId);
        return response()->json(["product"=>$productFound ]);
    }

    public function updateProduct(UpdateProductRequest $request, $productId){
        $validatedProductInfo = $request->validated();
        $updatedProduct = $this->productServices->updateProduct($validatedProductInfo,$productId);
        return response()->json([
            'message' => 'Producto creado correctamente',
            "updated_fields"=> $updatedProduct],
            200
        );
    }

    public function deleteProduct($productId){  
        $deletedProducted = $this->productServices->deleteProduct($productId);
    
        return response()->json(["message"=>"Producto eliminado con exito"],200);

    }

    public function priceListOfProduct($productId)
    {
        $priceListOfProduct = $this->productServices->priceListOfProduct($productId);
        return response()->json([$priceListOfProduct]);
       
    }

    public function createNewPriceOfProduct(CreateNewPriceProductRequest $request,$productId)
    {   
        
        $validatedPriceProduct = $request->validated();
        
        $newPriceProduct = $this->productServices->createNewPriceOfProduct($productId,$validatedPriceProduct);

        return response()->json([
                'message' => 'Precio agregado exitosamente.',
                "new_price"=> $newPriceProduct],
                200
            );
    }
}
