<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id'=>'required|integer',
            'title'      =>'required',
            'description'=>'required',
            'image'      =>'|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hit'        =>'required',
        ];
    }
}
