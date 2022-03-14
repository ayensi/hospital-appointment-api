<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Contracts\IHospitalService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    protected $hospitalService;

    public function __construct(IHospitalService $hospitalService)
    {
        $this->hospitalService = $hospitalService;
    }

    public function get()
    {
        return $this->hospitalService->get();
    }
    public function getByDistrictId($id)
    {
        return $this->hospitalService->getByCityId($id);
    }
    public function getById($id)
    {
        return $this->hospitalService->getById($id);
    }
    public function getByName($name)
    {
        return $this->hospitalService->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->hospitalService->store($request);
    }
    public function destroy($id)
    {
        return $this->hospitalService->destroy($id);
    }
    public function update(Request $request, $id)
    {
        return $this->hospitalService->update($request, $id);
    }
}
