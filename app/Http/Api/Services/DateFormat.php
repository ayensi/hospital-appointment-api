<?php

namespace App\Http\Api\Services;

use Illuminate\Http\Request;


class DateFormat
{
    public static function formatDate($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }
}
