<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran' ;

    protected $fillable = ['id', 'name', 'count', 'type', 'price', 'date'] ;

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'count' => 'integer',
        'type' => 'string',
        'price' => 'integer',
        'date' => 'date',
    ];
}