<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'produtos';

    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    public function store()
    {
        return $this->belongsTo(Store::class); //belongsTo(User::class, 'usuario_id')
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
