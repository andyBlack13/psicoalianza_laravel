<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\City;
use App\Models\Country;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(['city.country'])->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $countries = Country::all();
        $cities = City::all();
        return view('employees.create', compact('countries', 'cities', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        //dd($request->all());

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with(['city.country'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with(['city.country'])->findOrFail($id);
        $employees = Employee::all();
        $countries = Country::all();
        $cities = City::all();
        return view('employees.edit', compact('employee', 'countries', 'cities', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::with(['city.country'])->findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Empleado eliminado exitosamente.');
    }

    public function getCities($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        
        return response()->json($cities);
    }

}
