<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaAlias;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMediaAlias
{
    use HasFactory,InteractsWithMedia;
    protected $table = "products";
    public $timestamps = false;
    protected $fillable = [
        'title', 'description','price','create_date'
    ];
}
