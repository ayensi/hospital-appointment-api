<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\IClinicService;
use App\Http\Api\Repositories\ClinicRepository;
use Illuminate\Http\Request;

class ClinicService implements IClinicService
{
    private $clinicRepository;

    public function __construct(ClinicRepository $clinicRepository)
    {
        $this->clinicRepository = $clinicRepository;
    }

    public function get()
    {
        return $this->clinicRepository->get();
    }
    public function getById($id)
    {
        return $this->clinicRepository->getById($id);
    }
    public function getByName($name)
    {
        return $this->clinicRepository->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->clinicRepository->store($request);
    }
    public function destroy($id)
    {
        return $this->clinicRepository->destroy($id);
    }
    public function update(Request $request, $id)
    {
        return $this->clinicRepository->update($request, $id);
    }
}
