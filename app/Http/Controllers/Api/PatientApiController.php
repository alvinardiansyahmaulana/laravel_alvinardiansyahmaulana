<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Exception;

class PatientApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $hospital = $request->input('hospital');
            $patient = Patient::when($hospital, function ($query, $hospital) {
                $query->where('hospital_id', $hospital);
            })->with('hospital')->paginate(10);

            return $this->responseSuccess($patient);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function destroy(Patient $patient)
    {
        try {
            $patient->delete();

            return $this->responseSuccess('Data deleted.');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
