<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\IAppointmentService;
use App\Http\Api\Repositories\AppointmentRepository;
use Illuminate\Http\Request;

class AppointmentService implements IAppointmentService
{
    private $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function get()
    {
        return $this->appointmentRepository->get();

    }

    public function store(Request $request)
    {
        return $this->appointmentRepository->store($request);
    }

    public function getByDoctorId($id)
    {
        return $this->appointmentRepository->getByDoctorId();
    }

    public function getByUserId($id)
    {
        return $this->appointmentRepository->getByUserId();
    }

    public function getByDate($hourId, $appointmentDate)
    {
        return $this->appointmentRepository->getByDate();
    }

    public function getDueAppointments()
    {
        return $this->appointmentRepository->getDueAppointments();
    }

    public function getCompletedAppointments()
    {
        return $this->appointmentRepository->getCompletedAppointments();
    }

    public function getCancelledAppointments()
    {
        return $this->appointmentRepository->getCancelledAppointments();
    }

    public function getAvailableAppointmentsByDoctorId(Request $request)
    {
        return $this->appointmentRepository->getAvailableAppointmentsByDoctorId($request);
    }

    public function cancel($id)
    {
        return $this->appointmentRepository->cancel($id);
    }

    public function complete($id)
    {
        return $this->appointmentRepository->complete($id);
    }

    public function destroy($id)
    {
        return $this->appointmentRepository->destroy($id);
    }

    public function checkDateAvailability($date,$hourId,$doctorId)
    {
        return $this->appointmentRepository->checkDateAvailability($date,$hourId,$doctorId);
    }
}
