<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'photo' => [],
        ];
    }
}
