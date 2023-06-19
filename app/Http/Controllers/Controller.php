<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Success message
     */
    public function success($data, $status_code = 200)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], $status_code);
    }
    /**
     * fail message
     */
    public function fail($message, $status_code = 400)
    {
        return response()->json([
            'status' => 'fail',
            'message' => $message
        ], $status_code);
    }
}
