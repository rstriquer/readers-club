<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    use HasFactory;

    public $fillable = ['reading_from', 'reading_to', 'stars'];
    protected $casts = [
        'reading_from' => 'datetime:Y-m-d',
        'reading_to' => 'datetime:Y-m-d',
    ];
}
