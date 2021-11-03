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

                <!-------->
                <table class="table" id="multiForm">
                    <tr>
                        <td><input type="text" name="employee_contacts[0][phone]" class="form-control" placeholder="Phone Number - 1"/></td>
                        <td><input type="button" name="add" value="Add" id="addRemoveIp" class="btn btn-outline-dark btn-sm"></td>
                    </tr>
                </table>
                <!-------->

                <!--------------->
                <table class="table" id="multiAddress">
                    <tr>
                        <td><textarea name="employee_addresses[0][address]" class="form-control" placeholder="Address - 1"></textarea></td>
                        <td><input type="button" name="add" value="Add" id="addRemoveAddress" class="btn btn-outline-dark btn-sm"></td>
                    </tr>
                </table>
                <!--------------->

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
        var i = 1;
        $("#addRemoveIp").click(function () {
            ++i;
            $("#multiForm").append('<tr><td><input type="text" name="employee_contacts['+i+'][phone]" class="form-control" placeholder="Phone Number '+i+'"/></td><td><button type="button" class="remove-item btn btn-danger btn-sm">Delete</button></td></tr>');
        });
        $(document).on('click', '.remove-item', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script>
        var j = 1;
        $('#addRemoveAddress').click(function () {
           ++j;
           $('#multiAddress').append('<tr><td><textarea class="form-control" name="employee_addresses['+j+'][address]" placeholder="Address '+j+'"></textarea></td><td><button type="button" class="remove-item btn btn-danger btn-sm">Delete</button></td></tr>');
        });

        $(document).on('click', '.remove-address', function () {
           $(this).parent('tr').remove();
        });

    </script>
@endsection
