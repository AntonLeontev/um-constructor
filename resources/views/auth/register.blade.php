@extends('layouts.auth')

@section('title', __('auth.register'))

@section('content')
	<div class="flex items-center justify-center w-full h-screen">
		<form method="POST" action="{{ route('register') }}" class="card w-[315px]">
			<div class="card-body">
				<div class="text-center">{{ __('auth.register new account') }}</div>
				@csrf
				<div class="">
					<input type="text" class="input @error('name') input-error @else input-primary @enderror" name="name" placeholder="{{ __('auth.name') }}">
					@error('name')
						<div class="text-error">{{ $errors->first('name') }}</div>
					@enderror
				</div>
				<div class="">
					<input type="text" class="input @error('email') input-error @else input-primary @enderror" name="email" placeholder="Email">
					@error('email')
						<div class="text-error">{{ $errors->first('email') }}</div>
					@enderror
				</div>
				<div class="">
					<input type="password" class="input @error('password') input-error @else input-primary @enderror" name="password" placeholder="{{ __('auth.password') }}">
					@error('password')
						<div class="text-error">{{ $errors->first('password') }}</div>
					@enderror
				</div>
				<input type="password" class="input input-primary" name="password_confirmation" placeholder="{{ __('auth.confirm password') }}">
				<input type="submit" class="btn btn-primary" value={{ __("auth.register") }}>

				<div class="mt-3">
					Already have an account?
					<a class="link" href="{{ route('login') }}">Login</a>
				</div>
			</div>
		</form>
	</div>
@endsection
