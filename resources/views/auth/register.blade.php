@extends('layouts.app')

@section('content')
<div class="limiter">
	<div class="container-login100" style="background-image: url('{{ asset('login-assets/images/bg-01.jpg') }}');">
		<div class="wrap-login100 p-t-30 p-b-50">
			<span class="login100-form-title p-b-41">
				Register
			</span>
			<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('register') }}">
				{{ csrf_field() }}
				<div class="wrap-input100 validate-input" data-validate = "Enter username">
					<input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="Enter User Name" required autofocus>
						@if ($errors->has('name'))
							<span class="help-block px-5">
								<small>{{ $errors->first('name') }}</small>
							</span>
						@endif
					<span class="focus-input100" data-placeholder="&#xe82a;"></span>
				</div>
				<div class="wrap-input100 validate-input {{ $errors->has('email') ? 'has-error' : '' }}" data-validate="Enter email">
					<input class="input100" type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required>
						@if ($errors->has('email'))
							<span class="help-block">
								<small>{{ $errors->first('email') }}</small>
							</span>
						@endif
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>
				<div class="wrap-input100 validate-input {{ $errors->has('password') ? 'has-error' : '' }}" data-validate="Enter password">
					<input class="input100" type="password" name="password" placeholder="Enter User password" required>
						@if ($errors->has('password'))
							<span class="help-block">
								<small>{{ $errors->first('password') }}</small>
							</span>
						@endif
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>
				<div class="wrap-input100 validate-input {{ $errors->has('password') ? 'has-error' : '' }}" data-validate="Enter password">
					<input class="input100" type="password" name="password_confirmation" placeholder="Enter Confirm password" required>
						@if ($errors->has('password'))
							<span class="help-block">
								<small>{{ $errors->first('password') }}</small>
							</span>
						@endif
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>
				
				<div class="container-login100-form-btn m-t-32">
					<button class="login100-form-btn" type="submit">
					Register
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
