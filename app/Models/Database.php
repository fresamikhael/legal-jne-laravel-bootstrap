<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Database extends Model
{
    use HasFactory;

    protected $table = 'databases';

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

        $query->when($filters['number'] ?? false, function($query, $number) {
            return $query->where('number', 'like', '%'.$number.'%');
        });

        $query->when($filters['year'] ?? false, function($query, $year) {
            return $query->where('year', 'like', '%'.$year.'%');
        });

        $query->when($filters['number'] ?? false, function($query, $number) {
            return $query->where('number', 'like', '%'.$number.'%');
        });

        $query->when($filters['about'] ?? false, function($query, $about) {
            return $query->where('about', 'like', '%'.$about.'%');
        });
    }

    public function file()
    {
        return $this->hasMany(DatabaseFile::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'databases', 'length' => 6, 'prefix' => 'REG', 'reset_on_prefix_change' => true]);
        });
    }
}
