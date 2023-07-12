<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Ebook
 * @package App\Models
 *
 * Table fields
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
class Ebook extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'writer',
        'publisher',
        'edition',
        'pages',
        'price',
        'language',
        'book_url',
        'summary',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }
}
