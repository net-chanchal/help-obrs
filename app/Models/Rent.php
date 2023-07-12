<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
