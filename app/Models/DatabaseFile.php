<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'database_id',
        'name',
    ];

    public function database()
    {
        return $this->belongsTo(Database::class);
    }
}
