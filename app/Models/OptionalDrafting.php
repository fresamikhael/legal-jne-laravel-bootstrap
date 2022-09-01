<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionalDrafting extends Model
{
    use HasFactory;

    protected $table = 'optional_drafting';

    protected $fillable = [
        'drafting_id',
        'name',
        'file',
    ];

    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }
}
