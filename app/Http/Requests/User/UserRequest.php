<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'age' => ['required'],
            'password' => ['required'],
            'books_id' => ['nullable']
        ];
    }
}
