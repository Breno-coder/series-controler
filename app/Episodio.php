<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = [
        'id',
        'numero',
        'created_at',
        'updated_at'
    ];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
