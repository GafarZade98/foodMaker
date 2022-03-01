<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string|nullable',
            'photo' => 'file|nullable',
        ];
    }
}
