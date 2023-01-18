<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    //A category can held by multiple books
    public function books(){
        return $this->belongsToMany(Books::class,'books_categories','categories_id','books_id');
    }
}
