<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cheque;
use App\Models\Archive;

class ChequeController extends Controller
{
    public function index(Request $request) {
        $cheque = Cheque::all();

        response()->json([
            'data' => $data
        ], 200);
    }

    public function show(Request $request, $id) {
        $cheque = Cheque::find($id);

        response()->json([
            'data' => $data
        ], 200);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'recipient' => ['required'],
            'phone' => ['required'],
            'products_id' => ['required']
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'errors' => $errors
            ],403);
        }

        $validated = $validator->validated();

        $cheque = Cheque::create([
            'recipient' => $validated['recipient'],
            'phone' => $validated['phone']
        ]);

        $cheque->product()->attach($validated('products_id'));

        return response()->json([
            'data' => [
                'id' => $cheque['id']
            ]
        ],201);
    }
}
