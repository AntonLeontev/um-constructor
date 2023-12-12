@extends('layouts.auth')

@section('title', __('auth.login'))

@section('content')
	<div class="flex items-center justify-center w-full h-screen">
		<form method="POST" action="{{ route('login') }}" class="card w-[315px]">
			<div class="card-body">
				<div class="text-center">{{ __('auth.login to your account') }}</div>
				@csrf
				<div class="">
					<input type="text" class="input @error('email') input-error @else input-primary @enderror w-full" name="email" placeholder="Email">
					@error('email')
						<div class="text-error">{{ $errors->first('email') }}</div>
					@enderror
				</div>
				<div class="">
					<input type="password" class="input @error('password') input-error @else input-primary @enderror w-full" name="password" placeholder="{{ __('auth.password') }}">
					@error('password')
						<div class="text-error">{{ $errors->first('password') }}</div>
					@enderror
				</div>
				<input type="submit" class="btn btn-primary" value={{ __("auth.login") }}>
				
				@if (config('app.registration_enabled'))
					<div class="mt-3">
						Don't you have an account?
						<a class="link" href="{{ route('register') }}">Register</a>
					</div>
				@else
					<div class="mt-10">Sorry, registration is unavailable now</div>
					<div class="py-3">
						You can apply for testing by following the link: <a href="https://umchain.org/#form" class="link">Send request</a>
					</div>
				@endif
			</div>
		</form>
	</div>
@endsection
