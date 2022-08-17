<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
        return view('hospital.index');
    }

    public function show(Hospital $hospital)
    {
        return view('hospital.show', [
            'hospital' => $hospital->load('patients')
        ]);
    }

    public function edit(Hospital $hospital)
    {
        return view('hospital.edit', [
            'hospital' => $hospital
        ]);
    }

    public function update(Hospital $hospital, UpdateHospitalRequest $request)
    {
        $data = tap($hospital)->update($request->validated());

        return redirect()->route('hospital.show', $data->id)->with(['hospital' => $hospital]);
    }
}
