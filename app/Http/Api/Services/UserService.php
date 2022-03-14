<?php

namespace App\Http\Api\Services;

use App\Http\Api\Contracts\IUserService;
use App\Http\Api\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService implements IUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        return $this->userRepository->login($request);
    }

    public function register(Request $request)
    {
        return $this->userRepository->register($request);
    }
    public function logout(Request $request)
    {
        return $this->userRepository->logout($request);
    }
}
