<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/api', function () {

return response()->json("Hola api");
});