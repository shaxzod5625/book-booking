<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
