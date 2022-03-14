<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Models\Clinic;
use App\Http\Api\Services\Validation;
use Illuminate\Http\Request;

class ClinicRepository
{
    public function get()
    {
        $clinics = Clinic::all();
        return response()->json($clinics, 200);
    }
    public function getById($id)
    {
        $clinics = Clinic::all()->where('id', $id);
        return response()->json($clinics, 200);
    }
    public function getByName($name)
    {
        $clinics = Clinic::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($clinics, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
        ];
        Validation::validate($request, $rules);
        $clinic = Clinic::create($request->all());
        return response()->json($clinic, 200);
    }
    public function destroy($id)
    {
        $clinic = Clinic::find($id);
        if ($clinic) {
            Clinic::destroy($id);
            return response()->json([
                'message' => 'Successfully deleted.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the district.'
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $clinic = Clinic::find($id);
        $rules = [
            'name' => ['required'],
        ];

        if ($clinic) {
            Validation::validate($request, $rules);

            Clinic::where('id', $id)
                ->update([
                    'name' => $request->name,
                ]);
            $clinic = Clinic::find($id);

            return response()->json([
                'data' => $clinic,
                'message' => 'Successfully updated.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the district.'
            ], 404);
        }
    }
}
