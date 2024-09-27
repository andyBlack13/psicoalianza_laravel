@extends('layouts.app')

@section('content')
<div class="container mt-5">
<h1 class="mb-4"> <a href="{{ route('employee-role.index') }}"><img style="width: 1em;margin-right: 10px;" src="{{ asset('icons/arrowback-icon.webp') }}" alt=""></a> Asignar el Cargo</h1>
    <form action="{{ route('employee-role.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="employee_id" class="form-label">Empleado</label>
            <select name="employee_id" class="form-select" required>
                <option value="" disabled selected>Selecciona un empleado</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Rol</label>
            <select name="role_id" class="form-select" required>
                <option value="" disabled selected>Selecciona un rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" name="cargo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <input type="text" name="area" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="manager_id" class="form-label">Jefe</label>
            <select name="manager_id" class="form-select">
                <option value="">Ninguno</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Asignar</button>
    </form>
</div>
@endsection
