<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseRequest extends Model
{
    use HasFactory;

    protected $table = 'database_requests';

    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'database_requests', 'length' => 6, 'prefix' => 'DTR', 'reset_on_prefix_change' => true]);
        });
    }
}
