<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandSell extends Model
{
    use HasFactory;

    protected $table = 'land_sells';

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'land_sells', 'length' => 6, 'prefix' => 'LAS', 'reset_on_prefix_change' => true]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
