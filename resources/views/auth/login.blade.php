@extends('layouts.app')

@section('content')

<div class="limiter">
	<div class="container-login100" style="background-image: url('{{ asset('login-assets/images/bg-01.jpg') }}');">
		<div class="wrap-login100 p-t-30 p-b-50">
			<span class="login100-form-title p-b-41">
				Account Login
			</span>
			<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				<div class="wrap-input100 validate-input {{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Enter username">
					<input class="input100" type="email" name="email" value="{{ old('email') }}" required autofocus>
					@if ($errors->has('email'))
                        <span class="help-block px-5">
                            <small>{{ $errors->first('email') }}</small>
                        </span>
                    @endif
					<span class="focus-input100" data-placeholder="&#xe82a;"></span>
				</div>
				<div class="wrap-input100 validate-input {{ $errors->has('password') ? 'has-error' : '' }}" data-validate="Enter password">
					<input class="input100" type="password" name="password" placeholder="Password">
					@if ($errors->has('password'))
                        <span class="help-block px-5">
                            <small>{{ $errors->first('password') }}</small>
                        </span>
                    @endif
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>
				<div class="form-group px-5 pt-3">
					<div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" class="{{ old('remember') ? 'checked' : '' }}"> Remember Me
                        </label>
                    </div>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                    <a class="btn btn-link" href="{{ route('register') }}">
                        register as new
                    </a>
				</div>
				<div class="container-login100-form-btn m-t-32">
					<button class="login100-form-btn" type="submit">
					Login
					</button>
				</div>
				<p class="text-center">UserName: admin@email.com</p>
				<p class="text-center">Password: 12345678</p>
			</form>
		</div>
	</div>
</div>

@endsection