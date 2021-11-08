@extends('layouts.master')

@section('content')

    <div class="dashboard_container">

        <div id="dashboard-wrapper">

        <a href="{{ route('department.list') }}">
            
            {{-- department card --}}
            <div class="dash_items">
                <img src="images/departments.svg" alt="" id="item_img">
                <span>Department</span>
            </div>
            </a>

            {{-- employee card --}}
            <a href="{{ route('employee.list') }}" >
            <div class="dash_items">
                <img src="images/employees.svg" alt="" id="item_img">
                <span>Employee</span>
            </div>
            </a>

            <div id="base_bottom"></div>
        </div>
    </div>  
@endsection
