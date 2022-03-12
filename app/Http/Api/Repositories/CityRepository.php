<?php

namespace App\Http\Api\Repositories;

use App\Http\Api\Models\City;
use App\Http\Api\Models\District;
use App\Http\Api\Services\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityRepository
{
    public function get(){
        $cities = City::all();
        return response()->json($cities,200);
    }
    public function getById($id){
        $cities = City::all()->where('id',$id);
        return response()->json($cities,200);
    }
    public function getByName($name){
        $cities = City::where('name','like','%'.$name.'%')->get();
        return response()->json($cities,200);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
        ];
        Validation::validate($request,$rules);
        $city = City::create($request->all());
        return response()->json($city,200);
    }
    public function destroy($id)
    {
        $city = City::find($id);
        if($city)
        {
            City::destroy($id);
            return response()->json([
                'message'=>'Successfully deleted.'
            ],200);
        }
        else
        {
            return response()->json([
                'message'=>'Could not find the district.'
            ],404);
        }
    }
    public function update(Request $request,$id)
    {
        $city = City::find($id);
        $rules = [
            'name' => ['required'],
        ];

        if($city)
        {
            Validation::validate($request,$rules);

            City::where('id', $id)
                ->update([
                    'name' => $request->name,
                ]);
            $city = City::find($id);

            return response()->json([
                'data'=>$city,
                'message'=>'Successfully updated.'
            ],200);
        }
        else
        {
            return response()->json([
                'message'=>'Could not find the district.'
            ],404);
        }
    }
}
