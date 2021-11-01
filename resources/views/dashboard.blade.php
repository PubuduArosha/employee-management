@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('department.list') }}" class="btn btn-primary">Department</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('employee.list') }}" class="btn btn-primary">Employee</a>
            </div>
        </div>
    </div>
@endsection
