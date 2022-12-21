<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitHistory extends Model
{
    use HasFactory;

    protected $table = 'permit_history';

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    // protected $fillable = [
    //     'status',
    //     'permit_type',
    //     'location',
    //     'specification',
    //     'application_reason',
    //     'file_disposition',
    //     'file_document1',
    //     'file_document2',
    //     'file_document3',
    // ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'permit_history', 'length' => 6, 'prefix' => 'PRH', 'reset_on_prefix_change' => true]);
        });
    }
}
