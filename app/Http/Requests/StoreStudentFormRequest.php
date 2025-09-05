<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category' => 'required|string',
            'schoolYear' => 'required|string',
            'schoolId' => 'required|string',
            'course' => 'required|string',
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'middleInitial' => 'nullable|string|max:1',
            'extensionName' => 'nullable|string',
            'gender' => 'required|string|in:male,female,other',
            'cpNumber' => 'required|string',
            'province' => 'required|string',
            'provinceName' => 'required|string',
            'city' => 'required|string',
            'cityName' => 'required|string',
            'brgy' => 'required|string',
            'brgyName' => 'required|string',
            'heiName' => 'required|string',
            'constitutionCode' => 'required|string',
            'typeHeis' => 'required|string',
            'programLevelCode' => 'required|string',
        ];
    }
}
