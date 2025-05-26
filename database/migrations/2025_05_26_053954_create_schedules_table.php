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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_status_id')->references('id')->on('schedule_statuses')->nullOnDelete();
            $table->foreignId('company_car_id')->references('id')->on('company_cars')->nullOnDelete();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnDelete();
            $table->foreignId('trip_type_id')->references('id')->on('trip_types')->cascadeOnDelete();
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->timestamp('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
