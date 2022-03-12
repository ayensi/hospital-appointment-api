<?php

namespace App\Http\Api\Controllers;


use App\Http\Api\Contracts\IClinicService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ClinicController extends Controller
{
    protected $clinicService;

    public function __construct(IClinicService $clinicService)
    {
        $this->clinicService = $clinicService;
    }

    public function get()
    {
        return $this->clinicService->get();
    }
    public function getById($id)
    {
        return $this->clinicService->getById($id);
    }
    public function getByName($name)
    {
        return $this->clinicService->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->clinicService->store($request);
    }
    public function destroy($id)
    {
        return $this->clinicService->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->clinicService->update($request,$id);
    }
}
