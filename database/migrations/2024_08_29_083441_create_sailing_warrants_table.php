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
        Schema::create('sailing_warrants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ship_id');
            $table->tinyInteger('type');
            $table->dateTime('arrive_time');
            $table->dateTime('departure_time');
            $table->string('origin_port');
            $table->string('destination_port');
            $table->text('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sailing_warrants');
    }
};
