@extends('layouts.master')
@section('content')
<div id="update_wrapper">
    {{-- title --}}
    <div id="title">
        <a href="/employee/all">
            <div id="back">
                <img src="../../images/arrow.svg" alt="" id="back_btn">
            </div>
        </a>
        <h2>Update Employee</h2>
    </div>
    
    <div class="update_base scroll">
        <form action="{{ route('employee.update', $employee->id) }}" method="post" class="emp_update_form-base">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">Department <span class="text-danger">*</span></label>
                        <select name="department" class="form-control @error('department') is-invalid @enderror">
                            <option value="">Select the department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}" @if($department->id == $employee->department_id) selected @endif>{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- first name --}}
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">First Name<span class="text-danger">*</span></label>
                        <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- last name --}}
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">Last Name<span class="text-danger">*</span></label>
                        <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- birth date --}}
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">Birthday<span class="text-danger">*</span></label>
                        <input type="date" name="birthday" value="{{ $employee->birthday }}" class="form-control @error('birthday') is-invalid @enderror" placeholder="Birthday">
                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- nic --}}
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">NIC<span class="text-danger">*</span></label>
                        <input type="text" name="nic" value="{{ $employee->nic }}" class="form-control @error('nic') is-invalid @enderror" placeholder="NIC">
                        @error('nic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- designation --}}
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">Designation<span class="text-danger">*</span></label>
                        <input type="text" name="designation" value="{{ $employee->designation }}" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation">
                        @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- phone numbers --}}
                @foreach($employee->employee_contacts as $key => $employee_contact)
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">Phone Number - {{ $key+1 }}</label>
                        <input type="text" name="phone_{{$key+1}}" value="{{ $employee_contact->contact_number }}" class="form-control">
                    </div>
                </div>
                @endforeach
                {{-- address --}}
                @foreach($employee->employee_addresses as $key => $employee_address)
                <div class="col-md-6">
                    <div class="update-form">
                        <label for="">Address - {{ $key+1 }}</label>
                        <input type="text" name="address_{{$key+1}}" value="{{ $employee_address->address }}" class="form-control">
                    </div>
                </div>
                @endforeach
                <br/>
                
                {{-- update button --}}
                <div class="update_button_base">
                    <div class="update-form right">
                        <button class="update_btn" type="submit">Update</button>
                        <a href="{{ route('employee.list') }}" class="cancel_text">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection