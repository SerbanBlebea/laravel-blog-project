<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'         => 'required|string|max:255',
            'content'       => 'required',
            'category_id'   => 'required|integer',
            'feature_image' => 'required|image'
        ];
    }
}
