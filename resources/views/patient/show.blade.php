@extends('home')

@section('dashboard')
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Nama Pasien</div>

            <div class="card-body text-center">
                <h5>
                    {{ $patient->name }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Alamat</div>

            <div class="card-body text-center">
                <h5>
                    {{ $patient->address }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">No. Telepon</div>

            <div class="card-body text-center">
                <h5>
                    {{ $patient->phone }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Rumah Sakit Terdaftar</div>

            <div class="card-body text-center">
                <h5>
                    {{ $patient->hospital?->name ?? '-' }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Extra</div>

            <div class="card-body text-center d-grid gap-2">
                <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-outline-primary">Edit</a>
                <a href="/patients" class="btn">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection