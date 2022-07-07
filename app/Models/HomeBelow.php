<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBelow extends Model
{
    use HasFactory;

    protected $table = 'home_below';

    protected $fillable = [
        't1',
        't2',
        'photo',
    ];
}
