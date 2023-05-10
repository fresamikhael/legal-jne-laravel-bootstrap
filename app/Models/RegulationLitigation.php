<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationLitigation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $table = 'regulation_litigation';

    public $incrementing = true;

    protected $fillable = [
        'regulation_id',
        'shipping_date',
        'sender_name',
        'sender_phone_number',
        'case_type',
        'causative_factor',
        'causative_factor_others',
        'receiver_name',
        'receiver_phone_number',
        'total_loss',
        'item_nominal',
        'connote',
        'customer',
        'shipping_type',
        'assurance',
        'assurance_nominal',
        'incident_chronology',
        'shipping_form',
        'detail_shipping_form',
        'sender_province',
        'sender_regency',
        'sender_district',
        'sender_village',
        'sender_zip_code',
        'sender_address',
        'receiver_province',
        'receiver_regency',
        'receiver_district',
        'receiver_village',
        'receiver_zip_code',
        'receiver_address',
    ];
}
