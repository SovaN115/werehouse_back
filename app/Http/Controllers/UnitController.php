<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index(Request $request) {
        $units = Unit::all();

        response()->json([
            'data' => $data
        ], 200);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'unit' => ['required']
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'errors' => $errors
            ],403);
        }

        $validated = $validator->validated();

        $unit = Unit::create($validated);

        return response()->json([
            'data' => [
                'id' => $unit['id']
            ]
        ],201);
    }

    public function patch(Request $request, $id) {
        $unit = Unit::where('id', $id)->update($request->all());
        return response()->json([
            'data' => [
                'id' => $unit['id']
            ]
        ],201);
    }

    public function delete(Request $request, $id) {
        $unit = Unit::where('id', $id)->delete();

        return response()->json([
            'data' => [
                'id' => $unit['id']
            ]
        ],201);
    }
}
