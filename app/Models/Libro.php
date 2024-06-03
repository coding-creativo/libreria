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

    public function autore(){
        return $this->belongsTo(Autore::class);
    }

    public function editore(){
        return $this->belongsTo(Editore::class);
    }

    public function category() {
        return $this->belongsToMany(Categoria::class, 'libri_categorie');
    }


}
