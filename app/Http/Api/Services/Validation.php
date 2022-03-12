<?php

namespace App\Http\Api\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Validation
{
    public static function validate(Request $request, $rules)
    {
        $request->validate($rules);
    }

}
