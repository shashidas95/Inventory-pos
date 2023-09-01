<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'user_id' => 'required|exists:users,id',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'The category name is required.',
    //         'name.string' => 'The category name must be a string.',
    //         'name.max' => 'The category name may not be greater than :max characters.',
    //         'user_id.required' => 'The user ID is required.',
    //         'user_id.exists' => 'The selected user ID does not exist.',
    //     ];
    // }
}
