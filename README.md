# Employees

Simple internal system for booking and managing company cars by employees.

## Installation

### Clone

```bash
git clone https://github.com/tea-aroma/employees.git
```

```bash
cd employees/
```

---

### Environment

Copy the example `.env` file:

```bash
cp .env.example .env
```

Update `.env` with your custom values.

#### Database

```dotenv
DB_CONNECTION=pgsql
DB_HOST=employees_postgres
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

#### Cache & Queue (Redis)

```dotenv
QUEUE_CONNECTION=redis

CACHE_STORE=redis

REDIS_HOST=employees_redis
```

---

### Docker

Build and start the containers:

```bash
docker compose up -d --build
```

Notice: Make sure Docker and Docker Compose are installed and running on your system.

---

### Laravel

Install dependencies:

```bash
docker compose exec app composer install
```

Generate the application key:

```bash
docker compose exec app php artisan key:generate
```

Run migrations:

```bash
docker compose exec app php artisan migrate
```

Run seeder:

```bash
docker compose exec app php artisan db:seed --class=DatabaseSeeder 
```

Now the project should be available at: http://localhost:8000

---

## API

### Available routes (V1)

| URL                            | Description                     |
|--------------------------------|---------------------------------|
| `/employees/list`              | List of employees.              |
| `/cars/list`                   | List of cars.                   |
| `/company-cars/list`           | List of company cars.           |
| `/company-cars/available-list` | List of available company cars. |
| `/schedules/list`              | List of schedules.              |
| `/schedules/write`             | Create a new schedule.          |
| `/classifiers/list`            | List of classifier.             |

#### Employees

```js

const response = await HttpRequest.send({ url: 'api/v1/employees/list', method: 'get', data: { is_driver: false } });

console.log(response.getResponse());  // List without drivers

```

#### Schedules

```js

const data =
    {
        employee_id: 2,
        start_date: '2025-05-01 17:48:00',
        end_date: '2025-05-17 19:00:00',
        company_car_id: 3,
        trip_type_id: 2,
        description: 'Some text'
    };

const response = await HttpRequest.send({ url: 'api/v1/schedules/write', method: 'post', data });

console.log(response.getResponse()); // Schedule record

```

#### Company Cars

```js

const data =
    {
        target_employee_id: 2,
        start_date: '2025-05-01 17:48:00',
        end_date: '2025-05-17 19:00:00',
        car_comfort_id: 3,
        car_model_id: 2
    };

const response = await HttpRequest.send({ url: 'api/v1/company-cars/available-list', method: 'get', data });

console.log(response.getResponse()); // Available company cars for the specified employee by the specified period, comfort and model. 

```

#### Classifiers

```js

const httpRrequest = await HttpRequest.send({ url: 'api/v1/classifiers/list', method: 'get', data: { classifier_model: 'POSITION' } });

console.log(httpRrequest.getResponse());  // List of classifier by the specified 'classifier_model'.

```

---

## WEB

### Available routes (V1)

| URL                    | Description             |
|------------------------|-------------------------|
| `/admin/home/index`    | List of schedules.      |
| `/admin/home/schedule` | Schedule creating form. |


#### Specified inputs

##### Type (Index page)

- Type (`Possible`): cars that can be ordered. 
- Type (`Available`): cars that are already assigned.
