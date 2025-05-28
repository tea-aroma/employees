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
create function f_available_company_cars(x_employee_id bigint, x_start_date timestamp, x_end_date timestamp)
    returns table
            (
                id               bigint,
                car_id           bigint,
                driver_id        bigint,
                car_status_id    bigint,
                employee_id      bigint,
                position_id      bigint,
                company_car_name text,
                license_plate    varchar,
                vin              varchar,
                mileage          int,
                year             int,
                sort_order       int
            )
as
$$
begin
    if x_start_date >= x_end_date then
        raise exception 'Start date (%), must be before end date (%)', x_start_date, x_end_date;
    end if;

    return query
        select cc.id,
               cc.car_id                                                                        as car_id,
               cc.employee_id                                                                   as driver_id,
               cc.car_status_id,
               e2.id                                                                            as employee_id,
               p.id                                                                             as position_id,
               concat(cc.license_plate, ' | ', e.first_name, ' ', e.last_name, ' | ', cc2.name) as company_car_name,
               cc.license_plate,
               cc.vin,
               cc.mileage,
               cc.year,
               cc.sort_order
        from company_cars cc
                 left join public.cars c on cc.car_id = c.id
                 left join car_comforts cc2 on c.car_comfort_id = cc2.id
                 left join public.employees e on e.id = cc.employee_id
                 left join public.employees e2 on e2.id = x_employee_id
                 left join public.positions p on p.id = e2.position_id
                 left join positions_to_car_comforts ptcc
                           on ptcc.position_id = p.id and ptcc.car_comfort_id = c.car_comfort_id
                 left join schedules s
                           on cc.id = s.company_car_id
                               and s.start_date < x_end_date
                               and s.end_date > x_start_date
        where ptcc.id is not null
          and s.id is null and x_employee_id != cc.employee_id
        order by cc.sort_order;
end;
$$ language plpgsql;
PGSQL
);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('drop function if exists f_available_company_cars;');
    }
};
