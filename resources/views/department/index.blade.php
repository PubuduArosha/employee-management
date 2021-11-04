@extends('layouts.master')

@section('content')
    <div id="title">
        <div id="back"></div>
        <h1>Departments All</h1>
    </div>

    <a href="{{ route('department.create') }}" class="btn btn-success btn-sm">Create</a>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <th>Id</th>
            <th>Department Name</th>
            <th>Action(s)</th>
        </thead>

        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td style="display: flex;">
                        <a href="{{ route('department.show', $department->id) }}" class="btn btn-warning btn-sm mx-3">Edit</a>
                        <form action="{{ route('department.delete', $department->id) }}" method="post">
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
