<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class ApiController extends Controller
{
    public function getCategory()
    {
        try {
            $categories = Category::all();
            return response()->json([
                'success' => true,
                'message' => 'Categories retrieved successfully',
                'data'    => CategoryResource::collection($categories)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve categories',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function getProduct()
    {
        try {
            $products = Product::all();

            return response()->json([
                'success' => true,
                'message' => 'Products retrieved successfully',
                'data'    => ProductResource::collection($products)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve products',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
