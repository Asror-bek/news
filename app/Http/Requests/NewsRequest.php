<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Title' => 'required|string|max:255',
            'Text' => 'required|string|max:500',
            'Media' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'CategoryId' => 'integer',
            'TagId' => "nullable|array"
        ];
    }
}
