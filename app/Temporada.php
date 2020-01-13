<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $fillable = [
        'id',
        'numero',
        'created_at',
        'updated_at'
    ];

    public function  episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function serie()
    {
        return $this->belongsTo(serie::class);
    }
}
