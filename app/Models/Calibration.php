<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calibration extends Model
{
    protected $table = 'calibrations';

    protected $fillable = ['device_id', 'total_cm'];
}
