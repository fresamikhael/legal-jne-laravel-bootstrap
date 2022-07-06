<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationRequestAccess extends Model
{
    use HasFactory;

    protected $table = 'regulation_requests_access';

    protected $fillable = [
        'database_id',
        'name',
        'nik',
        'location',
    ];

    public function database()
    {
        return $this->belongsTo(Database::class);
    }
}
