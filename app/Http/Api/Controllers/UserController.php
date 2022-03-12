<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Contracts\IUserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{

    private $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }
    public function login(Request $request)
    {
        return $this->userService->login($request);
    }
    public function register(Request $request)
    {
        return $this->userService->register($request);
    }
    public function logout(Request $request){
        return $this->userService->logout($request);
    }
}
