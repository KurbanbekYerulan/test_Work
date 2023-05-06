<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
      'comment', 'username', 'book_id'
    ];

    public function book(){
        return $this->belongsTo(Book::class,'book_id','id');
    }
}
