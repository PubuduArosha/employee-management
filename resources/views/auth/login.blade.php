@extends('layouts.master')

@section('content')

<div class="login_base">
    <!-- <h1>Login</h1> -->

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }} 
        </div>
    @endif

    <div class="container">
        <div id="login_msg">
            Please login to continue.
        </div>
        <form action="{{ route('auth_login') }}" method="post" id="login_form">
            {{ csrf_field() }}
           
                  
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              
            
                   
                    <input id ="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               

            
                   <button id="login_btn" class="btn btn-success" type="submit">Login</button>
              
        </form>
    </div>
</div>
@endsection
