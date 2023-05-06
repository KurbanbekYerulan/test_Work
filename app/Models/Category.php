<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'slug'
    ];

    public function books(){
        return $this->hasMany(Book::class,'category_id','id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->books()->delete();
        });
    }
}
