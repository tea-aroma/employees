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
        Schema::create('positions_to_car_comforts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->references('id')->on('positions')->nullOnDelete();
            $table->foreignId('car_comfort_id')->references('id')->on('car_comforts')->nullOnDelete();

            $table->unique(['position_id', 'car_comfort_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions_to_car_comforts');
    }
};
