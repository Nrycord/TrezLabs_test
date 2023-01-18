<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    //A publisher can have many books
    public function books(){
        return $this->hasMany(Books::class);
    }
}
