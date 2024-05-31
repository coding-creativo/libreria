<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    
    use HasFactory;
    protected $table = 'libri';
    protected $fillable = [
        'titolo',
        'autore_id',
        'editore_id',
        'prezzo',
        'anno',
        'isbn',
        'lingua'
    ];

    public $timestamps = false;

}
