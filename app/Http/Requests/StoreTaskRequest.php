<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can implement custom authorization logic if needed
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
        ];
    }
}
