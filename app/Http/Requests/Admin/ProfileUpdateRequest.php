<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'avatar' => ['nullable', 'image', 'max:5000',],
            'breadcroumb' => ['nullable', 'image', 'max:5000',],
            'name' => ['required','max:255'],
            'email' => ['required','max:255','email'],
            'phone' => ['required','max:11'],
            'address' => ['required','max:255'],
            'about' => ['required', 'max:400'],
            'website' => ['nullable','url'],
            'fb_link' => ['nullable','url'],
            'insta_link' => ['nullable','url'],
            'x_link' => ['nullable','url'],
            'git_link' => ['nullable','url'],

        ];
    }
}
