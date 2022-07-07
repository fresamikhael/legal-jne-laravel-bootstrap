<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTop extends Model
{
    use HasFactory;

    protected $table = 'home_top';

    protected $fillable = [
        't1',
        't2',
        't3',
        'photo',
    ];
}
