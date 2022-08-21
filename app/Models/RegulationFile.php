<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'regulation_id',
        'name',
    ];

    public function database()
    {
        return $this->belongsTo(Regulation::class);
    }
}
