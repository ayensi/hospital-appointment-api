<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\ICityService;
use App\Http\Api\Repositories\CityRepository;
use Illuminate\Http\Request;

class CityService implements ICityService
{

    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function get()
    {
        return $this->cityRepository->get();
    }
    public function getById($id)
    {
        return $this->cityRepository->getById($id);
    }
    public function getByName($name)
    {
        return $this->cityRepository->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->cityRepository->store($request);
    }
    public function destroy($id)
    {
        return $this->cityRepository->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->cityRepository->update($request,$id);
    }

}
