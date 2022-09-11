<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        switch(request()->isMethod()){
            case 'POST':
                $data = [
                    'title' => 'required |unique:posts',
                    'category' => 'required',
                    'category_id' => 'required',
                    'salary' => 'required',
                    'vacancy' => 'required',
                    'city_id' => 'required',
                    'education' => 'required',
                    'last_date' => 'required',
                    'note' => 'required',
                    'description' => 'required',
                    'link' => 'required | url',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif'
                ];
                break;
            case "PUT":
                $data = [
                    'title' => 'required |unique:posts'. request()->id,
                    'category' => 'required',
                    'category_id' => 'required',
                    'salary' => 'required',
                    'vacancy' => 'required',
                    'city_id' => 'required',
                    'education' => 'required',
                    'last_date' => 'required',
                    'note' => 'required',
                    'description' => 'required',
                    'link' => 'required | url',
                    'image' => '|image|mimes:jpeg,png,jpg,gif'
                ];
        }
        return $data;
    }
}
