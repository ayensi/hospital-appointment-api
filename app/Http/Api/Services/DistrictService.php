<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\IDistrictService;
use App\Http\Api\Repositories\DistrictRepository;
use Illuminate\Http\Request;

class DistrictService implements IDistrictService
{
    private $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function get()
    {
        return $this->districtRepository->get();
    }
    public function getByCityId($id)
    {
        return $this->districtRepository->getByCityId($id);
    }
    public function getById($id)
    {
        return $this->districtRepository->getById($id);
    }
    public function getByName($name)
    {
        return $this->districtRepository->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->districtRepository->store($request);
    }
    public function destroy($id)
    {
        return $this->districtRepository->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->districtRepository->update($request,$id);
    }

}
