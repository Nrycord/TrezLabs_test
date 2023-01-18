<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
    ];
    //An author can have multiple books
    public function books(){
        return $this->hasMany(Books::class);
    }
}
