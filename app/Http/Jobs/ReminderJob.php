<?php

namespace App\Http\Jobs;

use App\Http\Api\Repositories\AppointmentRepository;
use Carbon\Carbon;

class ReminderJob
{
    protected $appointmentsRepository;
    public function __construct(AppointmentRepository $appointmentsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
    }

    public function getUsersToRemind()
    {
        $date = Carbon::now();
        $apponitments = $this->appointmentsRepository->get();
        $users = array();
        foreach ($apponitments as $appointment) {
            if ($appointment->appointment_date->diff($date) <= 3) {
                $users[] = $appointment->user_id;
            }
        }
        return $users;
    }
    public function sendEmailToUsers($users)
    {
        /* A Function To Send Email To Neccessary Users*/
        return 'Email sent!';
    }
}
