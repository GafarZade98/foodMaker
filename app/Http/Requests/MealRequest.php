<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string|nullable',
            'url' => 'string|nullable',
            'description' => 'string|nullable',
            'photo' => 'file|nullable',
        ];
    }
}
