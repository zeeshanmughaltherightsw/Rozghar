<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = [];
        switch(request()->method()){
            case 'POST':
                $data = [
                    'title' => 'required |unique:posts',
                    'category' => 'required',
                    'blog_category_id' => 'required',
                    'short_description' => 'required',
                    'description' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif'
                ];
                break;
            case "PUT":
                $data = [
                    'title' => 'required |unique:posts'. request()->id,
                    'category' => 'required',
                    'blog_category_id' => 'required',
                    'short_description' => 'required',
                    'description' => 'required',
                    'image' => '|image|mimes:jpeg,png,jpg,gif'
                ];
        }
        return $data;
    }
}
