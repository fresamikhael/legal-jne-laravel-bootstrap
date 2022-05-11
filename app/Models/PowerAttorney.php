<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PowerAttorney extends Model
{
    use HasFactory;

    protected $table = 'power_attorneys';

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'power_attorneys', 'length' => 6, 'prefix' => 'PAT', 'reset_on_prefix_change' => true]);
        });
    }
}
