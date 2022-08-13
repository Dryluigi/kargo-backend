<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = "drivers";
    protected $primaryKey = 'id';
    protected $fillable = ['name','phone_number', 'id_card_file_name', 'driver_license_file_name'];
}
