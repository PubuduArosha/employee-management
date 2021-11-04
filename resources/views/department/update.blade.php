@extends('layouts.master')

@section('content')
<div id="title">
    <a href="/department/all">
    <div id="back">
        <img src="../../images/arrow.svg" alt="" id="back_btn">
    </div>
    </a>
    <h2>Update Departments</h2>
</div>

    <div class="update_base">
        <form action="{{ route('department.update', $department->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="form-group">
                    <div class="col-md-8">
                        <label for="" class="dep_label">Department Name <span class="text-danger">*</span></label>
                        <input id="dep_input"  type="text" name="department_name" value="{{ $department->department_name }}" class="form-control @error('department_name') is-invalid @enderror" placeholder="Department Name">
                        @error('department_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <div class="up_base">
                        <button type="submit" class="update_btn">Update</button>
                        <a href="{{ route('department.list') }}" class="cancel_text">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
