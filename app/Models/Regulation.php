<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Regulation extends Model
{
    use HasFactory;

    protected $table = 'regulations';

    // protected $fillable = [
    //     'name',
    //     'title',
    //     'type',
    //     'file',
    //     'number',
    //     'date',
    //     'about',
    //     'set_date',
    //     'privilege',
    //     'agency',
    //     'status',
    //     'unit',
    //     'note',
    //     'historical_id',
    //     'share_amount',
    //     'authorized_person',
    //     'validity_period',
    //     'province',
    //     'regency',
    //     'district',
    //     'village',
    //     'address',
    //     'size',
    //     'tax_value',
    //     'ads_photo',
    //     'ads_text',
    //     'photo',
    //     'periodic_report',
    //     'wltk',
    //     'bpjs',
    //     'pp',
    //     'lks',
    //     'p2k3',
    //     'smk3',
    //     'time_period',
    //     'landlord',
    //     'other',
    //     'agreement_title',
    //     'body',
    //     'agreement_type',
    //     'user',
    //     'rental_value',
    //     'agent_type',
    //     'branch_name',
    //     'partner_name',
    //     'working_area',
    //     'title_deed',
    //     'notary_name',
    //     'director_name',
    //     'comms_name',
    //     'comms_term',
    //     'comms_arr',
    //     'comms_term_arr',
    //     'sk_type',
    //     'ktp',
    //     'npwp',
    //     'kk',
    //     'passport',
    //     'kbli',
    //     'ttl',
    //     'surface_area',
    //     'measure_number',
    //     'nop',
    //     'njop',
    //     'pbb',
    //     'retribution',
    //     'location',
    //     'transaction_value',
    //     'ppat',
    //     'seller_name',
    //     'nopol',
    //     'nobpkb',
    //     'nomes',
    //     'vehicle_type',
    //     'nostnk',
    //     'logo_file',
    //     'content',
    //     'design_type',
    //     'norangka',
    //     'building_area',
    //     'modal_dasar',
    //     'modal_disetor'
    // ];

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['unit'] ?? false, function ($query, $unit) {
            return $query->where('unit', 'like', '%' . $unit . '%');
        });

        $query->when($filters['privilege'] ?? false, function ($query, $privilege) {
            return $query->where('privilege', 'like', '%' . $privilege . '%');
        });

        $query->when($filters['number'] ?? false, function ($query, $number) {
            return $query->where('number', 'like', '%' . $number . '%');
        });

        $query->when($filters['type'] ?? false, function ($query, $type) {
            return $query->where('type', 'like', '%' . $type . '%');
        });

        $query->when($filters['agency'] ?? false, function ($query, $agency) {
            return $query->where('agency', 'like', '%' . $agency . '%');
        });

        $query->when($filters['about'] ?? false, function ($query, $about) {
            return $query->where('about', 'like', '%' . $about . '%');
        });

        $query->when($filters['name'] ?? false, function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        });

        $query->when($filters['dropperjanjian'] ?? false, function ($query, $name) {
            return $query->where('unit', 'like', '%' . $name . '%');
        });

        $query->when($filters['dropperizinan'] ?? false, function ($query, $name) {
            return $query->where('unit', 'like', '%' . $name . '%');
        });

        $query->when($filters['droplitigasi'] ?? false, function ($query, $name) {
            return $query->where('unit', 'like', '%' . $name . '%');
        });

        $query->when($filters['dropcorporate'] ?? false, function ($query, $name) {
            return $query->where('unit', 'like', '%' . $name . '%');
        });
    }

    public function data()
    {
        return $this->hasMany(RegulationFile::class, 'regulation_id', 'id');
    }

    public function dataUnit($unit)
    {
        switch ($unit) {
            case 'Perjanjian':
                $data = array(
                    [
                        "value" => "Sewa Menyewa",
                        "name" => "Sewa Menyewa"
                    ],
                    [
                        "value" => "Customer",
                        "name" => "Customer"
                    ],
                    [
                        "value" => "Supplier/Vendor",
                        "name" => "Supplier/Vendor"
                    ],
                    [
                        "value" => "Other",
                        "name" => "Other"
                    ],
                    [
                        "value" => "Keagenan",
                        "name" => "Keagenan"
                    ]
                );
                break;
            case 'Perizinan':
                $data = array(
                    [
                        "value" => "SKPD",
                        "name" => "Izin Reklame - SKPD"
                    ],
                    [
                        "value" => "TLBBR",
                        "name" => "Izin Reklame - TLBBR"
                    ],
                    [
                        "value" => "IPR",
                        "name" => "Izin Reklame - IPR"
                    ],
                    [
                        "value" => "UKL/UPL",
                        "name" => "Izin Lingkungan - UKL/UPL"
                    ],
                    [
                        "value" => "AMDAL",
                        "name" => "Izin Lingkungan - AMDAL"
                    ],
                    [
                        "value" => "SPPL",
                        "name" => "Izin Lingkungan - SPPL"
                    ],
                    [
                        "value" => "izin K3",
                        "name" => "Izin K3"
                    ],
                    [
                        "value" => "Disnaker",
                        "name" => "Disnaker"
                    ]
                );
                break;
            case 'Perizinan':
                $data = array(
                    [
                        "value" => "SKPD",
                        "name" => "Izin Reklame - SKPD"
                    ],
                    [
                        "value" => "TLBBR",
                        "name" => "Izin Reklame - TLBBR"
                    ],
                    [
                        "value" => "IPR",
                        "name" => "Izin Reklame - IPR"
                    ],
                    [
                        "value" => "UKL/UPL",
                        "name" => "Izin Lingkungan - UKL/UPL"
                    ],
                    [
                        "value" => "AMDAL",
                        "name" => "Izin Lingkungan - AMDAL"
                    ],
                    [
                        "value" => "SPPL",
                        "name" => "Izin Lingkungan - SPPL"
                    ],
                    [
                        "value" => "izin K3",
                        "name" => "Izin K3"
                    ],
                    [
                        "value" => "Disnaker",
                        "name" => "Disnaker"
                    ]
                );
                break;
        }
        return $data;
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'regulations', 'length' => 6, 'prefix' => 'DB', 'reset_on_prefix_change' => true]);
        });
    }
}
