<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Models\District;
use App\Http\Api\Models\Hospital;
use App\Http\Api\Services\Validation;
use Illuminate\Http\Request;

class HospitalRepository
{
    public function get()
    {
        $hospitals = Hospital::all();
        return response()->json($hospitals, 200);
    }
    public function getByDistrictId($id)
    {
        $hospitals = District::find($id)->hospitals;
        return response()->json($hospitals, 200);
    }
    public function getById($id)
    {
        $hospitals = Hospital::all()->where('id', $id);
        return response()->json($hospitals, 200);
    }
    public function getByName($name)
    {
        $hospitals = Hospital::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($hospitals, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'district_id' => ['required'],
        ];
        Validation::validate($request, $rules);
        $hospital = Hospital::create($request->all());
        return response()->json($hospital, 200);
    }
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        if ($hospital) {
            Hospital::destroy($id);
            return response()->json([
                'message' => 'Successfully deleted.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the Hospital.'
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $hospital = Hospital::find($id);
        if ($hospital) {
            $rules = [
                'name' => ['required'],
                'district_id' => ['required'],
            ];
            Validation::validate($request, $rules);
            Hospital::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'district_id' => $request->district_id
                ]);
            $hospital = Hospital::find($id);
            return response()->json([
                'data' => $hospital,
                'message' => 'Successfully updated.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the Hospital.'
            ], 404);
        }
    }
}
