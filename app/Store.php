<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model
{
  protected $fillable = ['name', 'description', 'phone', 'slug', 'logo'];

  use HasSlug;

  /**
   * Get the options for generating the slug.
   */
  public function getSlugOptions(): SlugOptions
  {
    return SlugOptions::create()
      ->generateSlugsFrom('name') //Campo de exemplo
      ->saveSlugsTo('slug');
  }

  public function user()
  {
    return $this->belongsTo(User::class); //belongsTo(User::class, 'usuario_id')
  }

  public function products()
  {
    return $this->hasMany(Product::class);
  }
}