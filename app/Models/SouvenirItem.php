<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouvenirItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'souvenir_category_id',
        'name',
        'quantity',
        'price',
        'url',
        'contents',
        'image'
    ];
}
