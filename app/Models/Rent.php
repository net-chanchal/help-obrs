<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static find(mixed $input)
 *
 * Table fields
 * @property $id
 * @property $ebook_id
 * @property $user_id
 * @property $payment_status
 * @property $created_at
 * @property $updated_at
 */

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'ebook_id',
        'user_id',
        'payment_status'
    ];

    /**
     * @return BelongsToMany
     */
    public function ebook(): BelongsToMany
    {
        return $this->belongsToMany(Ebook::class, 'rents', 'id', 'ebook_id');
    }

    /**
     * @return BelongsToMany
     */
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'rents', 'id', 'user_id');
    }
}
