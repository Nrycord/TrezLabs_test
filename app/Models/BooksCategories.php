<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksCategories extends Model
{
    use HasFactory;
    protected $table = 'books_categories';

    protected $fillable = [
        'books_id',
        'categories_id',
    ];
}
