<?php

namespace App\Providers;

use App\Http\Api\Contracts\IAppointmentService;
use App\Http\Api\Contracts\ICityService;
use App\Http\Api\Contracts\IClinicService;
use App\Http\Api\Contracts\IDistrictService;
use App\Http\Api\Contracts\IDoctorService;
use App\Http\Api\Contracts\IHospitalService;
use App\Http\Api\Contracts\IHourService;
use App\Http\Api\Contracts\IUserRepository;
use App\Http\Api\Contracts\IUserService;
use App\Http\Api\Repositories\UserRepository;
use App\Http\Api\Services\CityService;
use App\Http\Api\Services\ClinicService;
use App\Http\Api\Services\DistrictService;
use App\Http\Api\Services\DoctorService;
use App\Http\Api\Services\HospitalService;
use App\Http\Api\Services\HourService;
use App\Http\Api\Services\UserService;
use App\Http\Api\Services\AppointmentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IDistrictService::class, DistrictService::class);
        $this->app->bind(ICityService::class, CityService::class);
        $this->app->bind(IHospitalService::class, HospitalService::class);
        $this->app->bind(IHourService::class, HourService::class);
        $this->app->bind(IClinicService::class, ClinicService::class);
        $this->app->bind(IDoctorService::class, DoctorService::class);
        $this->app->bind(IAppointmentService::class, AppointmentService::class);

    }
}
