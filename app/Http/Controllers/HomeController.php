<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Patient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hospitalCount = Hospital::count();
        $patientCount = Patient::count();

        return view('index', [
            'hospitalCount' => $hospitalCount,
            'patientCount' => $patientCount
        ]);
    }
}
