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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('call_sign');
            $table->string('passenger_capacity');
            $table->string('vehicle_capacity');
            $table->string('weight');
            $table->string('flag');
            $table->string('skipper');
            $table->string('company');
            $table->string('imo_number');
            $table->string('crew_number');
            $table->text('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
