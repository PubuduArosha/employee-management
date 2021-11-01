<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return view('department.index')->with('departments', $departments);
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required'
        ]);

        $department = new Department();

        $department->department_name = $request->department_name;

        $department->save();

        return redirect(route('department.list'))->with('success', 'Department successfully created');
    }

    public function show($id)
    {
        $department = Department::find($id);

        return view('department.update')->with('department', $department);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required'
        ]);

        $department = Department::find($id);

        if($department) {

            $department->department_name = $request->department_name;

            $department->update();

            return redirect(route('department.list'))->with('success', 'Department successfully updated');
        }
    }

    public function delete($id)
    {
        $department = Department::find($id);

        if($department) {
            $department->delete();
            return redirect(route('department.list'))->with('success', 'Department successfully deleted');
        }
    }
}
