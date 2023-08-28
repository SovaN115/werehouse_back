<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $product = Product::select('products.name as name', 'products.description as description', 'products.count as count', 'units.unit as unit', 'categories.name as category')->join('units', 'products.unit_id', '=', 'unit.id')->join('categories', 'product.category_id', '=', 'categories.id')->get();

        response()->json([
            'data' => $data
        ], 200);
    }

    public function show(Request $request, $id) {
        $product = Product::where('products.id', $id)->select('products.name as name', 'products.description as description', 'products.count as count', 'units.unit as unit', 'categories.name as category')->join('units', 'products.unit_id', '=', 'unit.id')->join('categories', 'products.category_id', '=', 'categories.id')->get();

        response()->json([
            'data' => $data
        ], 200);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'count' => ['required'],
            'unit_id' => ['required'],
            'category_id' => ['required']
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'errors' => $errors
            ],403);
        }

        $validated = $validator->validated();

        $product = Product::create($validated);

        return response()->json([
            'data' => [
                'id' => $product['id']
            ]
        ],201);
    }

    public function patch(Request $request, $id) {
        $product = Product::where('id', $id)->update($request->all());
        return response()->json([
            'data' => [
                'id' => $product['id']
            ]
        ],201);
    }

    public function delete(Request $request, $id) {
        $product = Product::where('id', $id)->delete();
        return response()->json([
            'data' => [
                'id' => $product['id']
            ]
        ],201);
    }
}
