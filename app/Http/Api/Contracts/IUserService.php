<?php

namespace App\Http\Api\Contracts;

use Illuminate\Http\Request;

interface IUserService
{
    public function login(Request $request);

    public function register(Request $request);

    public function logout(Request $request);
}
