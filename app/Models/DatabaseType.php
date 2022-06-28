<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseType extends Model
{
    use HasFactory;

    protected $table = 'database_types';

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'database_types', 'length' => 6, 'prefix' => 'DBT', 'reset_on_prefix_change' => true]);
        });
    }
}
