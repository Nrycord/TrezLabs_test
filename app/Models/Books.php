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

    public function categories(){
        return $this->belongsToMany(Categories::class,'books_categories','books_id','categories_id');
    }

    //Obtains the publishers based on the id of the category you pass
    public function authors(){
        return $this->belongsTo(Authors::class, "authors_id");
    }

    //Obtains the publishers based on the id of the category you pass
    public function publishers(){
        return $this->belongsTo(Publishers::class, "publishers_id");
    }
}

