@extends('layouts.master')

@section('content')
    <h1>Employee update</h1>

    <div class="container">
        <form action="{{ route('employee.update', $employee->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
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


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">First Name<span class="text-danger">*</span></label>
                        <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Last Name<span class="text-danger">*</span></label>
                        <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Birthday<span class="text-danger">*</span></label>
                        <input type="date" name="birthday" value="{{ $employee->birthday }}" class="form-control @error('birthday') is-invalid @enderror" placeholder="Birthday">
                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NIC<span class="text-danger">*</span></label>
                        <input type="text" name="nic" value="{{ $employee->nic }}" class="form-control @error('nic') is-invalid @enderror" placeholder="NIC">
                        @error('nic')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Designation<span class="text-danger">*</span></label>
                        <input type="text" name="designation" value="{{ $employee->designation }}" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation">
                        @error('designation')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                @foreach($employee->employee_contacts as $key => $employee_contact)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Phone Number - {{ $key+1 }}</label>
                            <input type="text" name="phone_{{$key}}" value="{{ $employee_contact->contact_number }}" class="form-control">
                        </div>
                    </div>
                @endforeach

                @foreach($employee->employee_addresses as $key => $employee_address)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address - {{ $key+1 }}</label>
                            <input type="text" name="address_{{$key}}" value="{{ $employee_address->address }}" class="form-control">
                        </div>
                    </div>
                @endforeach

                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <button class="btn btn-success btn-sm" type="submit">Update</button>
                        <a href="{{ route('employee.list') }}" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
