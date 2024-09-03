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
            $table->foreignId('schedule_id');
            $table->dateTime('print_number');
            $table->dateTime('arrive_number')->nullable();
            $table->string('departure_number')->nullable();
            $table->text('situation')->nullable();
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
