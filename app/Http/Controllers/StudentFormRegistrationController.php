<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentFormRequest;
use App\Models\StudentFormRegistration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentFormRegistrationController extends Controller
{
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
                'message' => 'An error occured while processing your registration',
                'error' => config('app.debug') ? $th->getMessage() : 'Server error'
            ], 500);
        }
    }
}
