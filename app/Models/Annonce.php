<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //
    protected $table = 'annonces';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'price',
        'image',
    ];


}
