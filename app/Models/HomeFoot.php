<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFoot extends Model
{
    use HasFactory;

    protected $table = 'home_foot';

    protected $fillable = [
        't1',
        't2',
        't3',
        't4',
        't5',
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'photo',
    ];
}
