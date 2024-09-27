@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1> <a href="{{ route('employees.index') }}"><img style="width: 1em;margin-right: 10px;" src="{{ asset('icons/arrowback-icon.webp') }}" alt=""></a> Detalles del Empleado</h1>
    <p><strong>ID:</strong> {{ $employee->id }}</p>
    <p><strong>Nombres:</strong> {{ $employee->first_name }}</p>
    <p><strong>Apellidos:</strong> {{ $employee->last_name }}</p>
    <p><strong>Identificación:</strong> {{ $employee->identification }}</p>
    <p><strong>Dirección:</strong> {{ $employee->address }}</p>
    <p><strong>Telefono:</strong> {{ $employee->phone }}</p>
    <p><strong>País:</strong> {{ $employee->city->country->long_description }}</p>
    <p><strong>Ciudad:</strong> {{ $employee->city->name }}</p>
</div>
@endsection
