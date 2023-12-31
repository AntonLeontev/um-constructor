<div class="navbar bg-primary">
	<div class="flex-1">
		<a class="text-xl normal-case btn btn-ghost">UM</a>
	</div>
	@auth
		<div class="flex-none">
			<div class="dropdown dropdown-end">
				<label tabindex="0" class="btn btn-ghost avatar">
					<div class="">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
							<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg>
					</div>
					<span>{{ auth()->user()->name }}</span>
				</label>
				<ul tabindex="0" class="z-20 p-2 mt-3 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
					{{-- <li><a>Profile</a></li> --}}

					@if (auth()->user()->email === 'aner-anton@yandex.ru')
						<li>
							<a href="/telescope" class="justify-between" target="_blank">
								Telescope
								<span class="badge">Admin</span>
							</a>
						</li>
					@endif

					@if (Route::has('personal.sites'))
						<li>
							<a href="{{ route('personal.sites') }}" class="justify-between">
								Sites
							</a>
						</li>
					@endif

					<li>
						<form action="{{ route('logout') }}" method="POST">
							@csrf
							<input type="submit" value="{{ __('auth.logout') }}">
						</form>
					</li>
				</ul>
			</div>
		</div>
	@else
		<div class="">
			<a class="text-xl normal-case btn btn-ghost" href="{{ route('login') }}">Login</a>
		</div>
	@endauth
</div>
