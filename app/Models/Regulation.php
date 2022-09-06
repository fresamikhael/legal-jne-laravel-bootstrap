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
        'status',
        'unit',
        'note',
        'historical_id'
    ];

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['unit'] ?? false, function($query, $unit) {
            return $query->where('unit', 'like', '%'.$unit.'%');
        });

        $query->when($filters['privilege'] ?? false, function($query, $privilege) {
            return $query->where('privilege', 'like', '%'.$privilege.'%');
        });

        $query->when($filters['number'] ?? false, function($query, $number) {
            return $query->where('number', 'like', '%'.$number.'%');
        });

        $query->when($filters['type'] ?? false, function($query, $type) {
            return $query->where('type', 'like', '%'.$type.'%');
        });

        $query->when($filters['date'] ?? false, function($query, $date) {
            return $query->where('date', 'like', '%'.$date.'%');
        });

        $query->when($filters['about'] ?? false, function($query, $about) {
            return $query->where('about', 'like', '%'.$about.'%');
        });

        $query->when($filters['name'] ?? false, function($query, $name) {
            return $query->where('name', 'like', '%'.$name.'%');
        });
    }

    public function data()
    {
        return $this->hasMany(RegulationFile::class, 'regulation_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'regulations', 'length' => 6, 'prefix' => 'REG', 'reset_on_prefix_change' => true]);
        });
    }
}
