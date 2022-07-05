<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabasePublicRequest extends Model
{
    use HasFactory;

    protected $table = 'database_public_requests';

    protected $fillable = [
        'database_id',
        'name',
        'nik',
        'location',
    ];

    public function database()
    {
        return $this->belongsTo(Regulation::class);
    }
}
