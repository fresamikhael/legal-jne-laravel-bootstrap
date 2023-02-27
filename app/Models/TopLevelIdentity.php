<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopLevelIdentity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $table = 'top_level_identity';

    public $incrementing = true;

    protected $fillable = [
        'regulation_id',
        'name',
        'country',
        'position',
        'len_service',
        'share_amount',
    ];
}
