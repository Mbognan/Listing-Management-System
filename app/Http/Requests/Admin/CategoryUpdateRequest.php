<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image_icon' => [ 'nullable','image', 'max:3000'],
            'background_image' => ['nullable', 'image', 'max:3000'],
            'name' => ['nullable','string', 'max:255','unique:categories,name,'.$this->category],
            'show_at_home' => [ 'nullable','boolean'],
            'status' => [ 'nullable','boolean'],
        ];
    }
}
