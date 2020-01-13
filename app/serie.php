<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serie extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'id',
        'nome',
        'created_at',
        'updated_at'
    ];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);;
    }
}
