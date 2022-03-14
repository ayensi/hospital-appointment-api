<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\IDoctorService;
use App\Http\Api\Repositories\DoctorRepository;
use Illuminate\Http\Request;

class DoctorService implements IDoctorService
{
    private $doctorRepository;

    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function get()
    {
        return $this->doctorRepository->get();
    }
    public function getByClinicId($id)
    {
        return $this->doctorRepository->getByClinicId($id);
    }
    public function getByHospitalId($id)
    {
        return $this->doctorRepository->getByHospitalId($id);
    }
    public function getById($id)
    {
        return $this->doctorRepository->getById($id);
    }
    public function getByName($name)
    {
        return $this->doctorRepository->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->doctorRepository->store($request);
    }
    public function destroy($id)
    {
        return $this->doctorRepository->destroy($id);
    }
    public function update(Request $request, $id)
    {
        return $this->doctorRepository->update($request, $id);
    }
}
