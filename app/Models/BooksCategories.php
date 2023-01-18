<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksCategories extends Model
{
    use HasFactory;
    protected $table = 'books_categories';
    /*Holds the reference and connection in the "Many to Many" 
    that books and categories have*/
    protected $fillable = [
        'books_id',
        'categories_id',
    ];
}
