<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * **/
    public function up(): void
    {
        Schema::create('inference_results', function (Blueprint $table) {
            $table->id();
            $table->string('device_id');
            $table->float('scale_cm_px')->nullable();
            $table->float('total_cm_today')->nullable();
            $table->float('plant_cm_today')->nullable();
            $table->json('bbox_xyxy')->nullable();
            $table->integer('h_bbox_px_today')->nullable();
            $table->timestamp('timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inference_results');
    }
};
