<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class FileDocumentRequest extends Model
{
    protected $table = 'file_document_request';

    use HasFactory;

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
            $model->id = IdGenerator::generate(['table' => 'permits', 'length' => 6, 'prefix' => 'FDR', 'reset_on_prefix_change' => true]);
        });
    }
}
