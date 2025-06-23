<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = transaction::all();
        return response()->json([
            'status' => true,
            'message' =>  'Data transaction',
            'data' => $transaction,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'withdraw' => 'integer|min:0|required_without:deposit|prohibits:deposit',
        'deposit' => 'integer|min:0|required_without:withdraw|prohibits:withdraw',
    ], [
        'withdraw.required_without' => 'Either withdraw or deposit must be present',
        'withdraw.prohibits' => 'Cannot have both withdraw and deposit',
        'deposit.required_without' => 'Either withdraw or deposit must be present',
        'deposit.prohibits' => 'Cannot have both withdraw and deposit',
    ]);

    if($validator->fails()){
        return response()->json([
            'status' => false,
            'message' => 'Invalid request',
            'errors' => $validator->errors()
        ], 422); // Tambahkan status code 422 untuk validation error
    }

    $transaction = Transaction::create($request->all());
    
    return response()->json([
        'status' => true,
        'message' => 'Transaction created successfully',
        'data' => $transaction
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = transaction::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Data transaction',
            'data' => $transaction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'withdraw' => 'integer|min:0',
            'deposit' => 'integer|min:0',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' =>  'Invalid request',
                'errors' => $validator->errors()
            ]);
        }

        $transaction = transaction::findOrFail($id);
        $transaction->update($request->all());
        return response()->json([
            'status' => true,
            'message' =>  'Transaction updated successfully',
            'data' => $transaction
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = transaction::findOrFail($id);
        $transaction->delete();
        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully',
        ],204);
    }
}
