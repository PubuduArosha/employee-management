@extends('layouts.master')

@section('content')
    <h1>Employee create</h1>

    <div class="container">
        <form action="{{ route('employee.store') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Department <span class="text-danger">*</span></label>
                        <select name="department" class="form-control @error('department') is-invalid @enderror">
                            <option value="">Select the department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
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
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
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
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
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
                        <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" placeholder="Birthday">
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
                        <input type="text" name="nic" class="form-control @error('nic') is-invalid @enderror" placeholder="NIC">
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
                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation">
                        @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-sm" id="add_phone">Add phone</button>
                    </div>
                </div>


                <div class="phone_list" id="phone_list"></div>

                <div class="col-md-6" id="emp_phone">
                    <div class="form-group">
                        <label for="">Phone Number - 1</label>
                        <input type="number" name="phone_number_1" class="form-control" placeholder="Phone Number - 1">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-success btn-sm" type="submit">Create</button>
                        <a href="{{ route('employee.list') }}" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $('#add_phone').on('click', function () {
            console.log('click');
            $("#emp_phone").clone().insertAfter("div.phone_list:last");

        });
    </script>
@endsection
