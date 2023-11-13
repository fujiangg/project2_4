@extends('logins.forgetPasswordlayout')

@section('content')

<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    
  <form action="{{ route('forget.password.post') }}" method="POST">
    @csrf

    <div class="input-group mb-3">
      <input type="text" id="email" class="form-control" name="email" placeholder="Email" required autofocus>
        @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      <div class="input-group-append">  
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">
            Send Password Reset Link
        </button>
      </div>
    </div>

    <p class="mt-3 mb-1">
      <a href={{ route('login') }}>Back to Login</a>
    </p>

</form>
  
@endsection