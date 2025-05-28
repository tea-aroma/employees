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

        DB::unprepared(<<<PGSQL
create or replace function f_schedule_intersections(x_company_car_id bigint, x_start_date timestamp, x_end_date timestamp)
    returns int
as
$$
declare
    result int;
begin

    if x_start_date >= x_end_date then
        raise exception 'Start date (%), must be before end date (%)', x_start_date, x_end_date;
    end if;

    select count(*)
    into result
    from schedules s
             left join public.schedule_statuses ss on ss.id = s.schedule_status_id
             left join public.company_cars cc on cc.id = s.company_car_id
             left join public.employees e on s.employee_id = e.id
    where s.company_car_id = x_company_car_id
      and (ss.id != 4 and ss.id != 5)
      and (s.start_date < x_end_date and s.end_date > x_start_date);

    return result;
end;
$$ language plpgsql;
PGSQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop function if exists f_schedule_intersections;');
    }
};
