<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $fillable = ['name', 'description', 'phone', 'slug', 'logo'];

  public function user()
  {
    return $this->belongsTo(User::class); //belongsTo(User::class, 'usuario_id')
  }

  public function products()
  {
    return $this->hasMany(Product::class);
  }
}