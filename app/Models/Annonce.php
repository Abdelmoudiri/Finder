<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //
    protected $table = 'annonces';
    protected $fillable = [
        'titre',
        'description',
        'date',
        'lieu',
    ];


}
