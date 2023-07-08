<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class StoreEbookRequest
 * @package App\Http\Requests
 *
 * Table Object
 * @property $ebook
 *
 * Table Fields
 * @property $id
 * @property $title
 * @property $slug
 * @property $writer
 * @property $publisher
 * @property $edition
 * @property $pages
 * @property $price
 * @property $language
 * @property $book_url
 * @property $summary
 * @property $status
 * @property $created_at
 * @property $updated_at
 */
class StoreEbookRequest extends FormRequest
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
