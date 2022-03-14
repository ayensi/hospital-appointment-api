<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Models\Appointment;
use App\Http\Api\Models\Hour;
use App\Http\Api\Services\DateFormat;
use App\Http\Api\Services\Validation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppointmentRepository
{
    public function get()
    {
        $appointments = Appointment::all();
        return response()->json($appointments, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'doctor_id' => ['required'],
            'hour_id' => ['required'],
            'appointment_date' => ['required'],
        ];
        Validation::validate($request, $rules);
        $appointment_date = DateFormat::formatDate($request->appointment_date);
        $isAvailable = $this->checkDateAvailability($appointment_date, $request->hour_id, $request->doctor_id);
        if (!$isAvailable) {
            return response()->json([
                'message' => 'Specified date is not available.',
            ], 400);
        }

        $appointment = Appointment::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $request->doctor_id,
            'hour_id' => $request->hour_id,
            'appointment_date' => $appointment_date,
        ]);
        return response()->json($appointment, 200);
    }

    public function getByDoctorId($id)
    {
        $appointments = Appointment::all()
            ->where('doctor_id', $id);
        return response()->json($appointments, 200);
    }

    public function getByUserId($id)
    {
        $appointments = Appointment::all()
            ->where('user_id', $id);
        return response()->json($appointments, 200);
    }

    public function getByDate($hourId, $appointmentDate)
    {
        $appointment_date = DateFormat::formatDate($appointmentDate);

        $appointments = Appointment::all()
            ->where('hour_id', $hourId)
        ->where('appointment_date', $appointment_date);
        return response()->json($appointments, 200);
    }

    public function getDueAppointments()
    {
        $appointments = Appointment::all()
            ->where('is_pastDue', true);
        return response()->json($appointments, 200);
    }

    public function getCompletedAppointments()
    {
        $appointments = Appointment::all()
            ->where('is_completed', true);
        return response()->json($appointments, 200);
    }

    public function getCancelledAppointments()
    {
        $appointments = Appointment::all()
            ->where('is_cancelled', true);
        return response()->json($appointments, 200);
    }

    public function getAvailableAppointmentsByDoctorId(Request $request)
    {
        $rules = [
            'appointment_date' => ['required'],
            'doctor_id' => ['required'],
        ];
        $request->appointment_date = DateFormat::formatDate($request->appointment_date);
        Validation::validate($request, $rules);
        $appointments = Appointment::all()
            ->where('appointment_date', $request->appointment_date)
        ->where('doctor_id', $request->doctor_id);
        $hoursNotAvailable = array();
        $i = 0;
        foreach ($appointments as $appointment) {
            $hoursNotAvailable[$i] = $appointment->hour_id;
            $i++;
        }

        $hours = Hour::all()->whereNotIn('id', $hoursNotAvailable);
        $hours = $this->getAvailableHours($hours, $request->appointment_date);
        if ($hours) {
            return response()->json($hours, 200);
        } else {
            return response()->json([
                'message' => 'This date is past.',
            ], 403);
        }
    }

    public function cancel($id)
    {
        $appointment = Appointment::find($id);
        $appointment->is_cancelled = true;
        $appointment->save();
    }

    public function complete($id)
    {
        $appointment = Appointment::find($id);
        $appointment->is_completed = true;
        $appointment->save();
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            Appointment::destroy($id);
            return response()->json([
                'message' => 'Successfully deleted.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the appointment.'
            ], 404);
        }
    }


    public function checkDateAvailability($date, $hourId, $doctorId)
    {
        $appointment = Appointment::where([
            'doctor_id' => $doctorId,
            'appointment_date' => $date,
            'hour_id' => $hourId,
        ])->get();
        if (!$appointment->isEmpty()) {
            return false;
        }
        return true;
    }
    public function getAvailableHours($hours, $date)
    {
        //Get current date and wanted appointment day
        $currentDate = Carbon::now();
        $date = Carbon::parse($date);
        $diff = $date->diffInDays($currentDate);

        //Get current hour and minute and format it to integer to compare

        $current = Carbon::now()->format('H:i');
        $current = str_replace(':', '', $current);
        $current = (int) $current;

        if ($date->lt($currentDate)) {
            return null;
        }
        //If the wanted day and the present day is same
        if ($diff == 0) {
            foreach ($hours as $key => $hour) {
                $tmp = $hour->name;
                $tmp = str_replace(':', '', $tmp);
                $tmp = (int) $tmp;
                if ($current >= $tmp) {
                    unset($hours[$key]);
                }
            }

            return $hours;
        }
        //If the date is greater then today return available hours
        else {
            return $hours;
        }
    }
}
