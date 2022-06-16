<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseRequestFile extends Model
{
    protected $table = 'database_request_files';

    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'database_request_files', 'length' => 6, 'prefix' => 'FDR', 'reset_on_prefix_change' => true]);
        });
    }

    public function database()
    {
        return $this->belongsTo(Regulation::class);
    }
}
