@extends('logins.forgetPasswordlayout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
  
                    <form action="{{ route('reset.password.post') }}" method="POST">

                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
  
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
                          
                            <div class="input-group mb-3">
                                <input type="text" id="password" class="form-control" name="password" placeholder="Create New Password" required autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                <div class="input-group-append">  
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required autofocus>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                <div class="input-group-append">  
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
  
                          <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Reset Password
                                </button>
                            </div>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection