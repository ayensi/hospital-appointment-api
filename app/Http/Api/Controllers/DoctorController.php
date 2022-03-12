<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Contracts\IDoctorService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DoctorController extends Controller
{
    protected $doctorService;

    public function __construct(IDoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }

    public function get()
    {
        return $this->doctorService->get();
    }
    public function getByClinicId($id)
    {
        return $this->doctorService->getByClinicId($id);
    }
    public function getByHospitalId($id)
    {
        return $this->doctorService->getByHospitalId($id);
    }
    public function getById($id)
    {
        return $this->doctorService->getById($id);
    }
    public function getByName($name)
    {
        return $this->doctorService->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->doctorService->store($request);
    }
    public function destroy($id)
    {
        return $this->doctorService->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->doctorService->update($request,$id);
    }
}
