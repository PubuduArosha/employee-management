<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    // ✳ load all department page
    public function index()
    {
        $departments = Department::all(); // get all created department list
        return view('department.index')->with('departments', $departments);
    }

    // ✳ load department create page
    public function create()
    {
        return view('department.create');
    }

    // ✳ Department create method
    public function store(Request $request)
    {
        //validate department create form
        $request->validate([
            'department_name' => 'required'
        ]);

        $department = new Department(); // create new department object

        $department->department_name = $request->department_name;

        $department->save(); // save department as new department

        return redirect(route('department.list'))->with('success', 'Department successfully created'); // return to department list with the success message
    }

    // ✳ load department show page
    public function show($id)
    {
        $department = Department::find($id); // find the specific department

        return view('department.update')->with('department', $department); // return update page with the specific department
    }

    // ✳ Department update method
    public function update(Request $request, $id)
    {
        //validate department update form
        $request->validate([
            'department_name' => 'required'
        ]);

        $department = Department::find($id); // find the specific department

        if($department) {

            $department->department_name = $request->department_name;

            $department->update(); // update department

            return redirect(route('department.list'))->with('success', 'Department successfully updated'); // return department list page
        }
    }

    // ✳ department delete method
    public function delete($id)
    {
        $department = Department::find($id); // find the specific department

        if($department) { // check if department has
            $department->delete(); // delete department
            return redirect(route('department.list'))->with('success', 'Department successfully deleted'); // return department list page
        }
    }
}
