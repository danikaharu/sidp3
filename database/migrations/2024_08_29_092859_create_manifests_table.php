<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('manifests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id');
            $table->tinyInteger('type');
            $table->string('adult_passenger');
            $table->string('child_passenger');
            $table->string('vehicle_passenger');
            $table->string('group_I');
            $table->string('group_II');
            $table->string('group_III');
            $table->string('group_IVA');
            $table->string('group_IVB');
            $table->string('group_VA');
            $table->string('group_VB');
            $table->string('group_VIA');
            $table->string('group_VIB');
            $table->string('group_VII');
            $table->string('group_VIII');
            $table->string('group_IX');
            $table->string('load_factor_passenger');
            $table->string('load_factor_vehicle');
            $table->string('bulk_goods');
            $table->string('description_bulk_goods');
            $table->string('situation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manifests');
    }
};
