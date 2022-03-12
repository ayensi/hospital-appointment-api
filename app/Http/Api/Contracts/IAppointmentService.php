<?php

namespace App\Http\Api\Contracts;

use Illuminate\Http\Request;

interface IAppointmentService
{
    public function get();
    public function store(Request $request);
    public function getByDoctorId($id);
    public function getByUserId($id);
    public function getByDate($hourId,$appointmentDate);
    public function getDueAppointments();
    public function getCompletedAppointments();
    public function getCancelledAppointments();
    public function getAvailableAppointmentsByDoctorId(Request $request);
    public function cancel($id);
    public function complete($id);
    public function destroy($id);
    public function checkDateAvailability($date,$hourId,$doctorId);
}
