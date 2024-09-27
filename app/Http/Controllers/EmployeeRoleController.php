<?php
namespace App\Http\Controllers;

use App\Models\EmployeeRole;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeRoleController extends Controller
{
    public function index()
    {
        $employeeRoles = EmployeeRole::with(['employee', 'role', 'manager'])->get();
        return view('employee-role.index', compact('employeeRoles'));
    }

    public function create()
    {
        $employees = Employee::all();
        $roles = Role::all();
        return view('employee-role.create', compact('employees', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'role_id' => 'required',
            'position' => 'required|string',
            'area' => 'required|string',
            'manager_id' => 'nullable',
        ]);

        $role = Role::find($request->role_id);

        if ($role->name === 'Presidente' && $request->manager_id) {
            return back()->withErrors(['manager_id' => 'El presidente no puede tener un jefe.']);
        }

        EmployeeRole::create($request->all());

        return redirect()->route('employee-role.index')->with('success', 'Cargo asignado correctamente.');
    }

    public function edit(EmployeeRole $employeeRole)
    {
        $employees = Employee::all();
        $roles = Role::all();
        return view('employee-role.edit', compact('employeeRole', 'employees', 'roles'));
    }

    public function update(Request $request, EmployeeRole $employeeRole)
    {
        $request->validate([
            'role_id' => 'required',
            'position' => 'required|string',
            'area' => 'required|string',
            'manager_id' => 'nullable',
        ]);

        $role = Role::find($request->role_id);

        if ($role->name === 'Presidente' && $request->manager_id) {
            return back()->withErrors(['manager_id' => 'El presidente no puede tener un jefe.']);
        }

        $employeeRole->update($request->all());

        return redirect()->route('employee-role.index')->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy(EmployeeRole $employeeRole)
    {
        $employeeRole->delete();
        return redirect()->route('employee-role.index')->with('success', 'Registro eliminado correctamente.');
    }
}
