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
        'number',
        'date',
        'about',
        'set_date',
        'privilege',
        'agency',
        'status'
    ];

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['privilege'] ?? false, function($query, $privilege) {
            return $query->where('privilege', 'like', '%'.$privilege.'%');
        });

        $query->when($filters['type'] ?? false, function($query, $type) {
            return $query->where('type', 'like', '%'.$type.'%');
        });

        $query->when($filters['name'] ?? false, function($query, $name) {
            return $query->where('name', 'like', '%'.$name.'%');
        });
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'regulations', 'length' => 6, 'prefix' => 'REG', 'reset_on_prefix_change' => true]);
        });
    }
}
