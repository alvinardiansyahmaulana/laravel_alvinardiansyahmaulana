<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Patient;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.index', [
            'hospitals' => Hospital::select('id', 'name')->get()
        ]);
    }

    public function show(Patient $patient)
    {
        return view('patient.show', [
            'patient' => $patient->load('hospital')
        ]);
    }

    public function edit(Patient $patient)
    {
        return view('patient.edit', [
            'patient' => $patient->load('hospital'),
            'hospitals' => Hospital::select('id', 'name')->get()
        ]);
    }

    public function update(Patient $patient, PatientRequest $request)
    {
        $data = tap($patient)->update($request->validated());

        return redirect()->route('patient.show', $data->id)->with(['patient' => $data]);
    }
}
