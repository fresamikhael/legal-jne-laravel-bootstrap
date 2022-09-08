<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegulationUnit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'regulation_units', 'length' => 6, 'prefix' => 'REU', 'reset_on_prefix_change' => true]);
        });
    }

    public function type()
    {
        return $this->belongsTo(RegulationType::class, 'type_id', 'id');
    }
}
