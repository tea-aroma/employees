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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->references('id')->on('positions')->nullOnDelete();
            $table->foreignId('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreignId('employee_status_id')->references('id')->on('employee_statuses')->nullOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('patronymic')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->timestamp('hire_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
