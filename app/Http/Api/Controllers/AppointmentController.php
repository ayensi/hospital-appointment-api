<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Contracts\IAppointmentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $appointmentService;

    public function __construct(IAppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function get()
    {
        return $this->appointmentService->get();
    }

    public function store(Request $request)
    {
        return $this->appointmentService->store($request);
    }
    public function getAvailableAppointmentsByDoctorId(Request $request)
    {
        return $this->appointmentService->getAvailableAppointmentsByDoctorId($request);
    }

    public function cancel($id)
    {
        return $this->appointmentService->cancel($id);
    }
    public function complete($id)
    {
        return $this->appointmentService->complete($id);
    }
    public function destroy($id)
    {
        return $this->appointmentService->destroy($id);
    }
    public function getCancelledAppointments()
    {
        return $this->appointmentService->getCancelledAppointments();
    }
    public function getDueAppointments()
    {
        return $this->appointmentService->getDueAppointments();
    }
    public function getCompletedAppointments()
    {
        return $this->appointmentService->getCompletedAppointments();
    }
}
