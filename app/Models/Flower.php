<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    protected $table = 'flowers';

    protected $fillable = [
        'name',
        'specie',
        'description',
        'photo',
        'bees',
        'months'
    ];

    public function setBeesAttribute($value)
    {
        $this->attributes['bees'] = implode(', ', $value);
    }

    public function setMonthsAttribute($value)
    {
        $this->attributes['months'] = implode(', ', $value);
    }
}
