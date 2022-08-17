@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @yield('dashboard')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
