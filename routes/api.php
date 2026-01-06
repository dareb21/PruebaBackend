<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::controller(ProductController::class)->group(function() {
Route::prefix("products")->group(function() {
   Route::post("/","createNewProduct"); 
   Route::get("/{id}","viewProductById");
   Route::put("/{id}","updateProduct");
   Route::delete("/{id}","deleteProduct");
   Route::get("/{id}/prices","priceListOfProduct");
   Route::post("/{id}/prices","createNewPriceOfProduct");
});
});
