<?php

namespace App\Http\Requests\Frontend;

use App\Models\Listing;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AgentListingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     $listing =  Listing::select('user_id')->where('id', $this->listing)->first();
    //     return Auth::user()->id === $listing->user_id;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['image','required','max:3000'],
            'thumbnail_image' => ['image','required','max:3000'],
            'title' => ['max:255','required','string','unique:listings,title'],
            'category' => ['max:255','required','integer'],
            'location' => ['max:255','required','integer'],
            'address' => ['max:255','required'],
            'phone' => ['max:255','required'],
            'email' => ['max:255','required','email'],
            'website' => ['url','nullable'],
            'fb_link' => ['url','nullable'],
            'insta_link' => ['url','nullable'],
            'x_link' => ['url','nullable'],
            'git_link' => ['url','nullable'],
            'attachment' => ['nullable','mimes:png,jpg,csv,pdf','max:10000'],
            'amenities.*' => ['integer','nullable'],
            'description' => ['required'],
            'google_map_embed' =>['nullable'],
            'seo_title' => ['nullable','string','max:255'],
            'seo_description' => ['nullable','string','max:255'],
            'status' => ['required','boolean'],
            'is_featured' => ['required','boolean'],
            'is_verified' => ['required','boolean'],
        ];
    }
}
