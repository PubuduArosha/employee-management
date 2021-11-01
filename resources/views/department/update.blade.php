@extends('layouts.master')

@section('content')
    <h1>Department update</h1>

    <div class="container">
        <form action="{{ route('department.update', $department->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="form-group">
                    <div class="col-md-8">
                        <label for="">Department Name <span class="text-danger">*</span></label>
                        <input type="text" name="department_name" value="{{ $department->department_name }}" class="form-control @error('department_name') is-invalid @enderror" placeholder="Department Name">
                        @error('department_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                        <a href="{{ route('department.list') }}" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
