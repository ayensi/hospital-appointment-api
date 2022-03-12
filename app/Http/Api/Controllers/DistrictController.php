<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Contracts\IDistrictService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DistrictController extends Controller
{
    protected $districtService;

    public function __construct(IDistrictService $districtService)
    {
        $this->districtService = $districtService;
    }

    public function get()
    {
        return $this->districtService->get();
    }
    public function getByCityId($id)
    {
        return $this->districtService->getByCityId($id);
    }
    public function getById($id)
    {
        return $this->districtService->getById($id);
    }
    public function getByName($name)
    {
        return $this->districtService->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->districtService->store($request);
    }
    public function destroy($id)
    {
        return $this->districtService->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->districtService->update($request,$id);
    }
}
