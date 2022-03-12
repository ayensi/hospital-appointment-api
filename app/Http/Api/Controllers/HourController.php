<?php

namespace App\Http\Api\Controllers;


use App\Http\Api\Contracts\IHourService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HourController extends Controller
{
    protected $hourService;

    public function __construct(IHourService $hourService)
    {
        $this->hourService = $hourService;
    }

    public function get()
    {
        return $this->hourService->get();
    }
    public function getById($id)
    {
        return $this->hourService->getById($id);
    }
    public function getByName($name)
    {
        return $this->hourService->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->hourService->store($request);
    }
    public function destroy($id)
    {
        return $this->hourService->destroy($id);
    }
    public function update(Request $request,$id)
    {
        return $this->hourService->update($request,$id);
    }
}
