<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'type', 'category', 'weight', 'unit', 'cost', 'coin', 'damage_dice', 'image', 'description'];
}
