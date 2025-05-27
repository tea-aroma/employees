<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->down();

        DB::statement("create view v_employees as
        select e.id,
        e.position_id,
        p.name as position_name,
        p.code as position_code,
        e.department_id,
        d.name as department_name,
        d.code as department_code,
        e.employee_status_id,
        es.name as employee_status_name,
        es.code as employee_status_code,
        (cc.car_id is not null) as is_driver,
        e.first_name,
        e.last_name,
        e.patronymic,
        concat(e.first_name, ' ', e.last_name, ' ', e.patronymic) as full_name,
        e.email,
        e.phone,
        e.hire_date,
        e.created_at,
        e.updated_at,
        e.deleted_at
        from employees e
        left join public.positions p on p.id = e.position_id
        left join public.departments d on d.id = e.department_id
        left join public.employee_statuses es on es.id = e.employee_status_id
        left join public.company_cars cc on e.id = cc.employee_id;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("drop view if exists v_employees");
    }
};
