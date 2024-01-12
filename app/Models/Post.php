<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'body', 'image']; 
    //slug = campo user friedly, titolo formattato per essere nell'url, senza maiuscole / spazi(usa i -)
}
