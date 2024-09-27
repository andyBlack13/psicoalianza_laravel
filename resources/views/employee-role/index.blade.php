@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Asignaciones de Cargos</h1>
    <a href="{{ route('employee-role.create') }}" class="btn btn-success mb-3">Asignar Cargo</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Identificación</th>
                <th>Área</th>
                <th>Cargo</th>
                <th>Rol</th>
                <th>Jefe</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employeeRoles as $employeeRole)
                <tr>
                    <td>{{ $employeeRole->employee->first_name }} {{ $employeeRole->employee->last_name }}</td>
                    <td>{{ $employeeRole->employee->identification }}</td>
                    <td>{{ $employeeRole->area }}</td>
                    <td>{{ $employeeRole->position }}</td>
                    <td>{{ $employeeRole->role->name }}</td>
                    <td>
                        @if($employeeRole->manager)
                            {{ $employeeRole->manager->first_name }} {{ $employeeRole->manager->last_name }}
                        @else
                            No tiene jefe asignado
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employee-role.edit', $employeeRole->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('employee-role.destroy', $employeeRole->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
