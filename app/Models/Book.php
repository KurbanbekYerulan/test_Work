<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'description',
        'rating',
        'cover',
        'category_id'
    ];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'book_id','id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($book) {
            $book->comments()->delete();
        });
    }
}
