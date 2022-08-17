<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseSuccess($data)
    {
        return response([
            'error' => false,
            !(is_string($data)) ? 'data' : 'message' => $data
        ]);
    }

    public function responseError($message)
    {
        return response([
            'error' => true,
            'message' => $message
        ]);
    }
}
