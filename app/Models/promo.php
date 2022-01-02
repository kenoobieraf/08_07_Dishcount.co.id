<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class promo extends Model
{
    use softDeletes;

    protected $table = 'promo';
    protected $fillable = [
        'name',
        'description',
        'image'
    ];
    protected $hidden;
}