<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bee extends Model
{
    use HasFactory;
    protected $table = "bee_species";

    protected $fillable = [
        'name',
        'scientific_name'
    ];
}
