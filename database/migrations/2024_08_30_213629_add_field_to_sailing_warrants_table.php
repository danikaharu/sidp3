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
        Schema::table('sailing_warrants', function (Blueprint $table) {
            $table->string('print_number')->after('id');
            $table->string('arrive_number')->after('ship_id')->nullable();
            $table->string('departure_number')->after('arrive_number')->nullable();
            $table->string('situation')->after('destination_port')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sailing_warrants', function (Blueprint $table) {
            $table->dropColumn('print_number');
            $table->dropColumn('arrive_number');
            $table->dropColumn('departure_number');
            $table->dropColumn('situation');
        });
    }
};
