<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\EmployeeContact;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index')->with('employees', $employees);
    }

    public function create()
    {
        $departments = Department::all();

        return view('employee.create')->with('departments', $departments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'nic' => 'required',
            'designation' => 'required'
        ]);

        $employee = new Employee();

        $employee->department_id = $request->department;

        $employee->first_name = $request->first_name;

        $employee->last_name = $request->last_name;

        $employee->birthday = $request->birthday;

        $employee->nic = $request->nic;

        $employee->designation = $request->designation;

        if($employee->save()) {
            foreach ($request->phones as $key => $phone) {
                $employee_contact_number = new EmployeeContact();
                $employee_contact_number->contact_number = $request->phone_number_. $key;
                $employee_contact_number->save();
            }

            foreach ($request->addresses as $key => $address) {
                $employee_address = new EmployeeAddress();
                $employee_address->address = $request->address_.$key;
                $employee_address->save();
            }
        }
        return redirect(route('employee.list'))->with('success', 'Employee successfully created');
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        $departments = Department::all();

        return view('employee.update')
            ->with('employee', $employee)
            ->with('departments', $departments);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'nic' => 'required',
            'designation' => 'required'
        ]);

        $employee = Employee::find($id);

        if($employee) {

            $employee->department_id = $request->department;

            $employee->first_name = $request->first_name;

            $employee->last_name = $request->last_name;

            $employee->birthday = $request->birthday;

            $employee->nic = $request->nic;

            $employee->designation = $request->designation;

            $employee->update();

            return redirect(route('employee.list'))->with('success', 'Employee successfully updated');

        }
    }

    public function delete($id)
    {
        $employee = Employee::find($id);

        if($employee) {

            $employee->delete();

            return redirect(route('employee.list'))->with('success', 'Employee successfully deleted');

        }
    }
}