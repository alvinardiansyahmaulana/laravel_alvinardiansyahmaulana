<html>
    <div class="card">
        <div class="card-header text-center">{{ __('Navigation') }}</div>

        <div class="card-body d-grid gap-2">
            <a href="{{ route('home') }}" class="btn {{ Route::is('home') ? 'btn-primary' : 'btn-dark-outline' }}">Home</a>
            <a href="{{ route('hospital.index') }}" class="btn {{ Route::is('hospital.*') ? 'btn-primary' : 'btn-dark-outline' }}">Hospital</a>
            <a href="{{ route('patient.index') }}" class="btn {{ Route::is('patient.*') ? 'btn-primary' : 'btn-dark-outline' }}">Patient</a>
        </div>
    </div>
</html>