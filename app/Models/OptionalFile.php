<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionalFile extends Model
{
    use HasFactory;

    protected $table = 'optional_file';

    protected $fillable = [
        'document_id',
        'name',
        'file',
    ];

    public function outstanding()
    {
        return $this->belongsTo(Outstanding::class);
    }
}
