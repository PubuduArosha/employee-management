@extends('layouts.master')

@section('content')

    <div class="dashboard_container">

        
      
            <div class="dash_items">
                <a href="{{ route('department.list') }}" class="btn btn-primary">Department</a>
            </div>
            <div class="dash_items">
                <a href="{{ route('employee.list') }}" class="btn btn-primary">Employee</a>
            </div>

            <div id="base_bottom"></div>
      
    </div>
@endsection
