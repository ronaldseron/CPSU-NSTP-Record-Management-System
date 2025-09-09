<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentFormRequest;
use App\Models\StudentFormRegistration;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class StudentFormRegistrationController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentFormRequest $request): JsonResponse
    {
        try {
            // Validate the request data
            $validatedData = $request->validated();
    
            $registration = StudentFormRegistration::create([
                'user_id' => Auth::id(),
                ...$validatedData
            ]);
            
            return response()->json([
                'message' => 'Registration successful',
                'data' => $registration
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while processing your registration',
                'error' => config('app.debug') ? $th->getMessage() : 'Server error'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
