<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_number',
        'origin_id',
        'destination_id',
        'loading_date',
        'status',
        'truck_id',
        'driver_id'
    ];
}
