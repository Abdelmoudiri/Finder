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
        'type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments(){
        return$this->hasMany(Comment::class);
    }

}
