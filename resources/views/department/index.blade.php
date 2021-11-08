@extends('layouts.master')
@section('content')
{{-- title --}}
<div id="title">
    <a href="/dashboard">
        <div id="back">
            <img src="../images/arrow.svg" alt="" id="back_btn">
        </div>
    </a>
    <h2>All Departments</h2>
</div>
{{-- alert --}}
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

{{-- department create --}}
<a href="{{ route('department.create') }}" class="create">Create</a>
{{-- department list --}}
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
                <a href="{{ route('department.show', $department->id) }}" class="t_btn">Edit</a>
                <form action="{{ route('department.delete', $department->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="t_btn delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection