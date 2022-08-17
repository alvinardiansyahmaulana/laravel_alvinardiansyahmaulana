@extends('home')

@section('dashboard')
<form action="{{ route('hospital.update', $hospital->id) }}" method="post">
@csrf
@method('PUT')
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Nama Rumah Sakit</div>

            <div class="card-body text-center">
                <input type="text" name="name" id="name" class="form-control" value="{{ $hospital->name }}" />
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Alamat</div>

            <div class="card-body text-center">
                <textarea name="address" id="address" class="form-control">{{ $hospital->address }}</textarea>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Email</div>

            <div class="card-body text-center">
                <h5>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $hospital->email }}">
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Telepon</div>

            <div class="card-body text-center">
                <h5>
                    <input type="tel" name="phone" id="phone" class="form-control" value="{{ $hospital->phone }}">
                </h5>
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