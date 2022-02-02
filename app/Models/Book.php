<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['title', 'pageCount', 'thumbnail', 'isbn', 'id_api', 'published'];
    protected $casts = [
        'published' => 'date:Y-m-d',
    ];
    public function authors() : BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'author_books',
            'book_id',
            'author_id'
        );
    }
    public function publisher() : BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
    public function presentAuthors() : string
    {
        return $this->authors->implode('name', ',');
    }
}
