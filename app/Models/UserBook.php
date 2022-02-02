<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBook extends Model
{
    use HasFactory;

    public $fillable = ['reading_from', 'reading_to', 'rating'];
    protected $casts = [
        'reading_from' => 'date:Y-m-d',
        'reading_to' => 'date:Y-m-d',
    ];

    public function book() : BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
