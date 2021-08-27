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
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:500',
            'media' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'CategoryId' => 'integer',
            'UserId' => 'integer',
            'TagId'  => "nullable|array",
            "TagId.*"    => "nullable|integer|exists:tags,id",
        ];
    }
}
