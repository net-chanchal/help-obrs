<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;


class StoreRentRequest extends FormRequest
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
     * @return array
     */
    #[ArrayShape(['title' => "string", 'writer' => "string", 'price' => "string", 'book_url' => "string"])]
    public function rules(): array
    {
        return [
            'title' => 'required|unique:ebooks',
            'writer' => 'required',
            'price' => 'required',
            'book_url' => 'required'
        ];
    }
}
