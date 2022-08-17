@extends('home')

@section('dashboard')
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Nama Rumah Sakit</div>

            <div class="card-body text-center">
                <h5>
                    {{ $hospital->name }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Alamat</div>

            <div class="card-body text-center">
                <h5>
                    {{ $hospital->address }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Email</div>

            <div class="card-body text-center">
                <h5>
                    {{ $hospital->email }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Telepon</div>

            <div class="card-body text-center">
                <h5>
                    {{ $hospital->phone }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header text-center">Extra</div>

            <div class="card-body text-center d-grid gap-2">
                <a href="{{ route('hospital.edit', $hospital->id) }}" class="btn btn-outline-primary">Edit</a>
                <a href="/hospitals" class="btn">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">Daftar Pasien</div>

            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th></th>
                    </tr>
                    @foreach ($hospital->patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-up-right-from-square"></i></a>   
                                <a class="btn btn-outline-primary"><i class="fa-solid fa-pen"></i></a> 
                                <a class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                            </div>    
                        </td>    
                    </tr>    
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection