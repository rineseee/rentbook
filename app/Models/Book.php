<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'author',
        'published_year',
        'status'
    ];

    protected $casts = [
        'published_year' => 'datetime'
    ];

    public function rentals()
    {
        return $this->hasMany(Rentals::class);
    }

}
