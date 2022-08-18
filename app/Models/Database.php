<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    use HasFactory, Uuids;

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

        $query->when($filters['about'] ?? false, function($query, $about) {
            return $query->where('about', 'like', '%'.$about.'%');
        });
    }

    public function file()
    {
        return $this->hasMany(DatabaseFile::class);
    }
}
