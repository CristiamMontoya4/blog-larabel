<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Con esto configuración de user, para que acepte el titulo, el slug y el body
    protected $fillable = [
        'title',
        'slug',
        'body',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 
