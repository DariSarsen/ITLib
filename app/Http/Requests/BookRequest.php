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
            'description_en' => 'required',
            'description_ru' => 'required',
            'description_kz' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'document' => 'required|mimes:pdf,docx,epub,doc',
        ];
    }
}
