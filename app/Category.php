<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    protected $table = 'categories';

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
