<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['name'];
    public function books() : BelongsToMany
    {
        return $this->belongsToMany(
            Book::class,
            'author_books',
            'author_id',
            'book_id'
        );
    }
}
