<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaAlias;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMediaAlias
{
    use HasFactory,InteractsWithMedia;
    protected $table = "posts";
    public $timestamps = false;
    protected $fillable = [
        'title', 'description','tags','create_date'
    ];
}
