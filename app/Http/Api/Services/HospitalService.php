<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\IDistrictService;
use App\Http\Api\Contracts\IHospitalService;
use App\Http\Api\Repositories\HospitalRepository;
use Illuminate\Http\Request;

class HospitalService implements IHospitalService
{
    private $hospitalRepository;

    public function __construct(HospitalRepository $hospitalRepository)
    {
        $this->hospitalRepository = $hospitalRepository;
    }

    public function get()
    {
        return $this->hospitalRepository->get();
    }
    public function getByDistrictId($id)
    {
        return $this->hospitalRepository->getByDistrictId($id);
    }
    public function getById($id)
    {
        return $this->hospitalRepository->getById($id);
    }
    public function getByName($name)
    {
        return $this->hospitalRepository->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->hospitalRepository->store($request);
    }
    public function destroy($id)
    {
        return $this->hospitalRepository->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->hospitalRepository->update($request,$id);
    }

}
