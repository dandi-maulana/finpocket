<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'users' => true,
            'message' =>  'Users retrieved successfully',
            'data' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $users = User::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'data' => $users
        ], 201);

         $users = User::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'data' => $users
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        return response()->json(
            [
                'status' => true,
                'message' => 'User retrieved successfully',
                'data' => $users
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email' => 'email',
            'password' => 'min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
        $users = User::findOrFail($id);
        $users->update($request->all());

        return response()->json([
            'status' => true,
            'message' =>  'User updated successfully',
            'data' => $users
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully',
        ], 204);
    }
}
