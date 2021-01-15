<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Notifications\EmployeeDestroyed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $employees = Employee::all()->where('company_id', '=', $company->id);

        return view('components.employees.index', ['company' => $company, 'employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('components.employees.create', ['company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request, Company $company)
    {
        $employee = Employee::query()->create([
            'company_id' => $company->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'title' => $request->title,
            'phone' => $request->phone,
            'hired' => $request->hired,
        ]);

        return redirect()->route('companies.employees.show', ['company' => $company, 'employee' => $employee]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, Employee $employee)
    {
        return view('components.employees.show', ['company' => $company, 'employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Employee $employee)
    {
        return view('components.employees.edit', ['company' => $company, 'employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Company $company, Employee $employee)
    {
        $employee->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'title' => $request->title,
            'phone' => $request->phone,
            'hired' => $request->hired,
        ]);

        return redirect()->route('companies.employees.show', ['company' => $company, 'employee' => $employee]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Company $company, Employee $employee)
    {
        $id = $employee->id;

        $details = ['message' => $employee->name.' has been destroyed!'];

        $employee->delete();

        Auth::user()->notify(new EmployeeDestroyed($details));

        return response()->json(['message' => 'Deleted employee #'.$id.' successfully.']);
    }
}
