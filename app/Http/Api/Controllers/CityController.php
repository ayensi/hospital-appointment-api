<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Contracts\ICityService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $cityService;

    public function __construct(ICityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function get()
    {
        return $this->cityService->get();
    }
    public function getById($id)
    {
        return $this->cityService->getById($id);
    }
    public function getByName($name)
    {
        return $this->cityService->getByName($name);
    }
    public function store(Request $request)
    {
        return $this->cityService->store($request);
    }
    public function destroy($id)
    {
        return $this->cityService->destroy($id);
    }
    public function update(Request $request, $id)
    {
        return $this->cityService->update($request, $id);
    }
}
