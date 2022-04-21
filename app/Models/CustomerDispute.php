<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CustomerDispute extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'customer_disputes', 'length' => 6, 'prefix' => 'CD', 'reset_on_prefix_change' => true]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
