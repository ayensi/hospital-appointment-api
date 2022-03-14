<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Models\City;
use App\Http\Api\Models\Clinic;
use App\Http\Api\Models\Doctor;
use App\Http\Api\Models\Hospital;
use App\Http\Api\Services\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorRepository
{
    public function get()
    {
        $doctors = Doctor::all();
        return response()->json($doctors, 200);
    }
    public function getByClinicId($id)
    {
        $doctors = Clinic::find($id)->doctors;
        return response()->json($doctors, 200);
    }
    public function getByHospitalId($id)
    {
        $doctors = Hospital::find($id)->doctors;
        return response()->json($doctors, 200);
    }
    public function getById($id)
    {
        $doctors = Doctor::all()->where('id', $id);
        return response()->json($doctors, 200);
    }
    public function getByName($name)
    {
        $doctors = Doctor::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($doctors, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'clinic_id' => ['required'],
            'hospital_id' => ['required'],
            'gender' => ['required'],
        ];
        Validation::validate($request, $rules);
        $doctor = Doctor::create($request->all());
        return response()->json($doctor, 200);
    }
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            Doctor::destroy($id);
            return response()->json([
                'message' => 'Successfully deleted.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the Doctor.'
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $rules = [
                'name' => ['required'],
                'clinic_id' => ['required'],
                'hospital_id' => ['required'],
                'gender' => ['required'],
            ];
            Validation::validate($request, $rules);
            Doctor::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'clinic_id' => $request->clinic_id,
                    'gender' => $request->gender,
                    'hospital_id' => $request->hospital_id
                ]);
            $doctor = Doctor::find($id);
            return response()->json([
                'data' => $doctor,
                'message' => 'Successfully updated.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the Doctor.'
            ], 404);
        }
    }
}
