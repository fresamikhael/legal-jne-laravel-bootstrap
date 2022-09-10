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
        'historical_id',
        'share_amount',
        'authorized_person',
        'validity_period',
        'province',
        'regency',
        'district',
        'village',
        'address',
        'size',
        'tax_value',
        'ads_photo',
        'ads_text',
        'photo',
        'periodic_report',
        'wltk',
        'bpjs',
        'pp',
        'lks',
        'p2k3',
        'smk3',
        'time_period',
        'landlord',
        'other',
        'agreement_title',
        'body',
        'agreement_type',
        'user',
        'rental_value',
        'agent_type',
        'branch_name',
        'partner_name',
        'working_area',
        'title_deed',
        'notary_name',
        'director_name',
        'comms_name',
        'comms_term',
        'comms_arr',
        'comms_term_arr',
        'comms_name_file',
        'comms_term_file',
        'comms_arr_file',
        'comms_term_arr_file',
        'sk_type',
        'ktp',
        'npwp',
        'kk',
        'passport',
        'kbli',
        'ttl',
        'ktp_photo',
        'npwp_photo',
        'kk_photo',
        'passport_photo',
        'pas_photo',
        'surface_area',
        'measure_number',
        'nop',
        'njop',
        'pbb',
        'retribution',
        'location',
        'transaction_value',
        'ppat',
        'seller_name',
        'nopol',
        'nobpkb',
        'nomes',
        'vehicle_type',
        'nostnk',
        'logo_file',
        'content',
        'design_type',
        'norangka',
        'building_area',
        'director_name1',
        'comms_name1',
        'comms_term1',
        'comms_arr1',
        'comms_term_arr1',
        'director_name2',
        'comms_name2',
        'comms_term2',
        'comms_arr2',
        'comms_term_arr2',
        'director_name3',
        'comms_name3',
        'comms_term3',
        'comms_arr3',
        'comms_term_arr3',
        'comms_name_share',
        'comms_term_share',
        'comms_arr_share',
        'comms_term_arr_share',
        'comms_name_share1',
        'comms_term_share1',
        'comms_arr_share1',
        'comms_term_arr_share1',
        'comms_name_share2',
        'comms_term_share2',
        'comms_arr_share2',
        'comms_term_arr_share2',
        'comms_name_share3',
        'comms_term_share3',
        'comms_arr_share3',
        'comms_term_arr_share3',
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

        $query->when($filters['agency'] ?? false, function($query, $agency) {
            return $query->where('agency', 'like', '%'.$agency.'%');
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
            $model->id = IdGenerator::generate(['table' => 'regulations', 'length' => 6, 'prefix' => 'DB', 'reset_on_prefix_change' => true]);
        });
    }
}
