@extends('home')

@section('dashboard')

<div class="row justify-content-md-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center">
                Rumah Sakit Terdaftar
            </div>
            <div class="card-body text-center">
                <h1> {{ $hospitalCount }} </h1>
                <a href="{{ route('hospital.index') }}">Detail</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center">
                Pasien Terdaftar
            </div>
            <div class="card-body text-center">
                <h1> {{ $patientCount }} </h1>
                <a href="{{ route('patient.index') }}">Detail</a>
            </div>
        </div>
    </div>
</div>

@endsection