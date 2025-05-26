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
        Schema::create('company_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->references('id')->on('cars');
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('car_status_id')->references('id')->on('car_statuses')->nullOnDelete();
            $table->foreignId('car_color_id')->references('id')->on('car_colors')->nullOnDelete();
            $table->string('license_plate')->unique();
            $table->string('vin')->unique();
            $table->integer('mileage')->default(0);
            $table->year('year');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->unique([ 'car_id', 'employee_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_cars');
    }
};
