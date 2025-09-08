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
            'school_year' => 'required|string',
            'school_id' => 'required|string',
            'course' => 'required|string',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_initial' => 'nullable|string|max:1',
            'extension_name' => 'nullable|string',
            'gender' => 'required|string|in:male,female,other',
            'cp_number' => 'required|string',
            'province_name' => 'required|string',
            'city_name' => 'required|string',
            'brgy_name' => 'required|string',
            'hei_name' => 'required|string',
            'constitution_code' => 'required|string',
            'type_heis' => 'required|string',
            'program_level_code' => 'required|string',
        ];
    }
}
