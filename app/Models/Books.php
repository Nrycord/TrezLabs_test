<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'authors_id',
        'publishers_id',
        'number_of_pages',
    ];

    //A book can belong to many categories
    public function categories(){
        return $this->belongsToMany(Categories::class,'books_categories','books_id','categories_id');
    }

    //Obtains the author that wrote the book
    public function authors(){
        return $this->belongsTo(Authors::class, "authors_id");
    }

    //Obtains the publisher in charge of the book
    public function publishers(){
        return $this->belongsTo(Publishers::class, "publishers_id");
    }
}

