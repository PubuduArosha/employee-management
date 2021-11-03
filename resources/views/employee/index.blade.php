@extends('layouts.master')

@section('content')
    <h1>Employee List</h1>

    <a href="{{ route('employee.create') }}" class="btn btn-success btn-sm">Create</a>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>NIC</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Phone(s)</th>
                <th>Address(s)</th>
                <th>Action(s)</th>
            </tr>
        </thead>

        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->birthday }}</td>
                    <td>{{ $employee->nic }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $employee->department->department_name }}</td>
                    <td>
                        @foreach($employee->employee_contacts as $employee_contact)
                            <p>{{ $employee_contact->contact_number }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach($employee->employee_addresses as $employee_address)
                            <p>{{ $employee_address->address }}</p>
                        @endforeach
                    </td>
                    <td style="display: flex">
                        <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-warning btn-sm mx-3">Edit</a>
                        <form action="{{ route('employee.delete', $employee->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
