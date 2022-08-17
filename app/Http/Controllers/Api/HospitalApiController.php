<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Hospital;
use Exception;

class HospitalApiController extends Controller
{
    public function index()
    {
        try {
            return $this->responseSuccess(Hospital::withCount('patients')->paginate(10));
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function destroy(Hospital $hospital)
    {
        try {
            $hospital->delete();

            return $this->responseSuccess('Data Deleted.');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
