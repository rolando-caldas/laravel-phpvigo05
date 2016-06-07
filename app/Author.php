<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    
    /**
     * Listado de atributos que son "mass assignable"
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'bio',
        'slug',
        'photo',
    ];
    
    /**
     * Retorna un array con los libros asociados al autor
     * 
     * @return App\Book[]
     */
    public function books() {
        return $this->hasMany('App\Book');
    }
    
    public function fullname() {
        return $this->name . ' ' . $this->surname;
    }
}