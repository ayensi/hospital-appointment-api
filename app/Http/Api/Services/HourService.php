<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\IHourService;
use App\Http\Api\Repositories\HourRepository;
use Illuminate\Http\Request;

class HourService implements IHourService
{

    private $hourRepository;

    public function __construct(HourRepository $hourRepository)
    {
        $this->hourRepository = $hourRepository;
    }

    public function get()
    {
        return $this->hourRepository->get();
    }
    public function getById($id)
    {
        return $this->hourRepository->getById($id);
    }
    public function getByName($name)
    {
        return $this->hourRepository->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->hourRepository->store($request);
    }
    public function destroy($id)
    {
        return $this->hourRepository->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->hourRepository->update($request,$id);
    }

}
