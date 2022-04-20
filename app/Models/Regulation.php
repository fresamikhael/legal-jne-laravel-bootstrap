<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Regulation extends Model
{
    use HasFactory;

    protected $table = 'regulations';

    protected $fillable = [
        'name',
        'type',
        'file',
        'rule_type'
    ];

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'regulations', 'length' => 6, 'prefix' => 'REG', 'reset_on_prefix_change' => true]);
        });
    }
}
