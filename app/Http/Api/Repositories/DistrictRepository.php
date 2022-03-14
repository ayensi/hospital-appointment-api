<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Models\City;
use App\Http\Api\Models\District;
use App\Http\Api\Services\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistrictRepository
{
    public function get()
    {
        $districts = District::all();
        return response()->json($districts, 200);
    }
    public function getByCityId($id)
    {
        $districts = City::find($id)->districts;
        return response()->json($districts, 200);
    }
    public function getById($id)
    {
        $districts = District::all()->where('id', $id);
        return response()->json($districts, 200);
    }
    public function getByName($name)
    {
        $districts = District::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($districts, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'city_id' => ['required'],
        ];
        Validation::validate($request, $rules);
            $district = District::create($request->all());
            return response()->json($district, 200);
    }
    public function destroy($id)
    {
        $district = District::find($id);
        if ($district) {
            District::destroy($id);
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
        $district = District::find($id);
        if ($district) {
            $rules = [
                'name' => ['required'],
                'city_id' => ['required'],
            ];
            Validation::validate($request, $rules);
            District::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'city_id' => $request->city_id
                ]);
            $district = District::find($id);
            return response()->json([
                'data' => $district,
                'message' => 'Successfully updated.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the district.'
            ], 404);
        }
    }
}
