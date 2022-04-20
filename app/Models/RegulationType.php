<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RegulationType extends Model
{
    use HasFactory;

    protected $table = 'regulation_types';

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'regulation_types', 'length' => 6, 'prefix' => 'RET', 'reset_on_prefix_change' => true]);
        });
    }
}
