<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Listado de atributos que son "mass assignable"
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'poster',
        'extract',
        'slug',
        'author_id'
    ];
        
    /**
     * Retorna el autor de libro.
     * 
     * @return App\Author
     */
    public function author() {
        return $this->belongsTo('App\Author');
    }  
}
