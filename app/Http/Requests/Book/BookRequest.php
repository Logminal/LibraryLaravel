<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'img' => ['required', 'mimes:jpeg,png,jpg'],
            'name_book' => ['required'],
            'desk' => ['required'],
            'author' => ['required'],
            'category' => ['required'],
            'book' => ['required', 'mimes:pdf']
        ];
    }
}
