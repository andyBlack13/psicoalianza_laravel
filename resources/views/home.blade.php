@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="text-align: center; font-size:large;margin-top:3em">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h3 style="font-size: xx-large;">{{ __('¡Bienvenida! ') }} {{ __('') . Auth::user()->name . ' ' . Auth::user()->last_name }}</h3><br>

                <p style="margin-top: 2em;">Añade los datos personales de tus empleados y después agrega su cargo en tu empresa</p>

                <a href="{{ route('employees.create') }}" class="btn btn-primary">Empieza aquí</a>
            </div>
        </div>
    </div>
</div>
@endsection
