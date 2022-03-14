<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Models\Hour;
use App\Http\Api\Services\Validation;
use Illuminate\Http\Request;

class HourRepository
{
    public function get()
    {
        $hours = Hour::all();
        return response()->json($hours, 200);
    }
    public function getById($id)
    {
        $hours = Hour::all()->where('id', $id);
        return response()->json($hours, 200);
    }
    public function getByName($name)
    {
        $hours = Hour::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($hours, 200);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required','date_format:H:i'],
        ];
        Validation::validate($request, $rules);
        $hour = Hour::create($request->all());
        return response()->json($hour, 200);
    }
    public function destroy($id)
    {
        $hour = Hour::find($id);
        if ($hour) {
            Hour::destroy($id);
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
        $hour = Hour::find($id);
        $rules = [
            'name' => ['required','unique:hours'],
        ];

        if ($hour) {
            Validation::validate($request, $rules);

            Hour::where('id', $id)
                ->update([
                    'name' => $request->name,
                ]);
            $hour = Hour::find($id);

            return response()->json([
                'data' => $hour,
                'message' => 'Successfully updated.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Could not find the district.'
            ], 404);
        }
    }
}
