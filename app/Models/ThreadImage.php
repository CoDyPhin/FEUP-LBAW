<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadImage extends Model
{
    use HasFactory;
    
    protected $table = 'threadimages';

    public $timestamps  = false;

    protected $fillable = [
        'image', 
    ];

}
