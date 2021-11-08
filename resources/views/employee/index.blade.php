@extends('layouts.master')

@section('content')
<div id="title">
    <a href="/dashboard">
    <div id="back">
        <img src="../images/arrow.svg" alt="" id="back_btn">
    </div>
    </a>
    <h2>Employee List</h2>
</div>

    <a href="{{ route('employee.create') }}" class="create">Create</a>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- table list --}}
    <table class="table">
        {{-- table head --}}
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

        {{-- table data --}}
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
                    {{-- delete --}}
                    <td style="display: flex">
                        <a href="{{ route('employee.show', $employee->id) }}" class="t_btn">Edit</a>
                        <form action="{{ route('employee.delete', $employee->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="t_btn delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
