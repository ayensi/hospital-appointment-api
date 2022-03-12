<?php

namespace App\Http\Api\Contracts;

use Illuminate\Http\Request;

interface IDoctorService
{
    public function get();
    public function getByClinicId($id);
    public function getByHospitalId($id);
    public function getById($id);
    public function getByName($name);
    public function store(Request $request);
    public function destroy($id);
    public function update(Request $request,$id);
}
