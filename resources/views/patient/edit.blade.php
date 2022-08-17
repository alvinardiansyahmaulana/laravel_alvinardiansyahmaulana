@extends('home')

@section('dashboard')
<form action="{{ route('patient.update', $patient->id) }}" method="post">
@csrf
@method('PUT')
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Nama Rumah Sakit</div>

            <div class="card-body text-center">
                <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name }}" />
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Alamat</div>

            <div class="card-body text-center">
                <textarea name="address" id="address" class="form-control">{{ $patient->address }}</textarea>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Telepon</div>

            <div class="card-body text-center">
                <h5>
                    <input type="tel" name="phone" id="phone" class="form-control" value="{{ $patient->phone }}">
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Rumah Sakit Terdaftar</div>

            <div class="card-body">
                <select class="form-control" name="hospital_id" id="hospital_id"">
                @foreach ($hospitals as $hospital)
                    <option 
                        @if($hospital->id == $patient->hospital_id)
                        selected
                        @endif
                    value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Extra</div>

            <div class="card-body text-center">
                <a href="{{ url()->previous() }}" class="btn">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </div>
        </div>
    </div>
</div>
</form>
@endsection