<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\EmployeeContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    // ✳ load all employees page
    public function index()
    {
        $employees = Employee::all(); // get all created employee list

        return view('employee.index')->with('employees', $employees);
    }

    // ✳ load employee create page
    public function create()
    {
        $departments = Department::all(); // get all created department list

        return view('employee.create')->with('departments', $departments);
    }

    // ✳ employee create method
    public function store(Request $request)
    {
        //validate employee create form
        $request->validate([
            'department' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'nic' => 'required',
            'designation' => 'required'
        ]);

        $employee = new Employee();  // create new employee object

        $employee->department_id = $request->department;

        $employee->first_name = $request->first_name;

        $employee->last_name = $request->last_name;

        $employee->birthday = $request->birthday;

        $employee->nic = $request->nic;

        $employee->designation = $request->designation;

        if($employee->save()) { // save employee as new employee
            
            if(!empty($request->employee_contacts)) {
                foreach ($request->employee_contacts as $employee_contact) {
                    EmployeeContact::create([
                        'employee_id' => $employee->id,
                        'contact_number' => $employee_contact['phone']
                    ]);
                }
            }

            if(!empty($request->employee_addresses)) {
                foreach ($request->employee_addresses as $employee_address) {
                    EmployeeAddress::create([
                        'employee_id' => $employee->id,
                        'address' => $employee_address['address']
                    ]);
                }
            }
            
        }

        return redirect(route('employee.list'))->with('success', 'Employee successfully created'); // return to employee list with the success message

    }

    // ✳ load Employee show page
    public function show($id)
    {
        $employee = Employee::find($id); // find the specific employee

        $departments = Department::all(); // get all created department list

        return view('employee.update')
            ->with('employee', $employee)
            ->with('departments', $departments); // return employee edit page with specific employee and department list
    }

    // ✳ Employee update method
    public function update(Request $request, $id)
    {
        //validate employee update form
        $request->validate([
            'department' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'nic' => 'required',
            'designation' => 'required'
        ]);

        // find the specific employee
        $employee = Employee::find($id);

        if($employee) {

            $employee->department_id = $request->department;

            $employee->first_name = $request->first_name;

            $employee->last_name = $request->last_name;

            $employee->birthday = $request->birthday;

            $employee->nic = $request->nic;

            $employee->designation = $request->designation;

            $employee->update(); // update employee

            return redirect(route('employee.list'))->with('success', 'Employee successfully updated'); // return employee list page

        }
    }

    // ✳ Employee delete method
    public function delete($id)
    {
        $employee = Employee::find($id); // find the specific employee

        if($employee) { // check if employee has

            $employee->delete(); //delete employee

            return redirect(route('employee.list'))->with('success', 'Employee successfully deleted'); // return employee list page

        }
    }
}
