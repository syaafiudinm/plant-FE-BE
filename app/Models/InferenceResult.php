<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InferenceResult extends Model
{
    protected $table = 'inference_results';

    protected $fillable = [
        'device_id',
        'timestamp',
        'bbox_xyxy',
        'h_bbox_px_today',
        'scale_cm_px',
        'total_cm_today',
        'plant_cm_today',
    ];

    protected $casts = [
        'bbox_xyxy' => 'array',
        'timestamp' => 'datetime',
    ];
}
