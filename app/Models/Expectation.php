<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expectation extends Model
{
    use HasFactory;

    protected $fillable = ['img', 'name_book', 'desk', 'author', 'category', 'book'];

    public $timestamps = false;
}
