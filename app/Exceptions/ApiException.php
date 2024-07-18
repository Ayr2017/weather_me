<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'data' => null,
            'status_code' => 500,
            'errors' => null,
            'message' => 'Server error',
        ], 500);
    }
}
