<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $category = Category::all();

        response()->json([
            'data' => $data
        ], 200);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required']
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'errors' => $errors
            ],403);
        }

        $validated = $validator->validated();

        $category = Category::create($validated);

        return response()->json([
            'data' => [
                'id' => $category['id']
            ]
        ],201);
    }

    public function patch(Request $request, $id) {
        $category = Category::where('id', $id)->update($request->all());
        return response()->json([
            'data' => [
                'id' => $category['id']
            ]
        ],201);
    }

    public function delete(Request $request, $id) {
        $category = Category::where('id', $id)->delete();

        return response()->json([
            'data' => [
                'id' => $category['id']
            ]
        ],201);
    }
}
