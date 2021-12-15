<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
  protected $fillable = ['name', 'description', 'slug'];

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

  public function products()
  {
    return $this->belongsToMany(Product::class);
  }
}