<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required|numeric|max:2022|min:1700',
            'description' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'document' => 'required|mimes:pdf,docx,epub,doc',
        ];
    }
}
