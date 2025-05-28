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

        DB::statement(<<<PGSQL
create view v_schedules as
select s.id,
       s.schedule_status_id,
       ss.name as schedule_status_name,
       s.company_car_id,
       cc.license_plate,
       cc.employee_id as driver_id,
       (e.first_name || ' ' || e.last_name) as driver_full_name,
       s.employee_id,
       (e2.first_name || ' ' || e2.last_name) as employee_full_name,
       s.trip_type_id,
       tt.name as trip_type_name,
       s.description,
       s.start_date,
       s.end_date
from schedules s
left join schedule_statuses ss on ss.id = s.schedule_status_id
left join company_cars cc on cc.id = s.company_car_id
left join employees e on e.id = cc.employee_id
left join employees e2 on e2.id = s.employee_id
left join trip_types tt on tt.id = s.trip_type_id;
PGSQL
);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop view if exists v_schedules');
    }
};
