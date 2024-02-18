<header class="fixed top-0 left-0 right-0 z-30 flex items-center justify-between py-[5px] px-[10px] -translate-y-full transition bg-primary" id="header"
	:class="show && '!transform-none'"
	x-data="{
		show: false,

		init() {
			this.show = sessionStorage.getItem('constructor-header') === 'true'
		},
		toggle() {
			this.show = !this.show
			sessionStorage.setItem('constructor-header', this.show)
		},
	}" 
>
	<div class="flex items-center gap-3">
		<a class="btn" href="{{ route('personal.site', $site->id) }}">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
			</svg>
		</a>
		<div class="relative">
			<div class="absolute w-full text-sm text-center">AI generation</div>
			<div class="py-6 join">
				<button class="btn btn-accent join-item" @click="text_generation_modal.showModal()" title="Text generation">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
						<path d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081zm2.7-7.923L6.34 9.314H3.51l1.4-4.156zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525"/>
					</svg>
				</button>
				<button class="btn btn-accent join-item" @click="image_generation_modal.showModal()" title="Image generation">
					<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
						<path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
						<path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
					</svg>
				</button>
			</div>
		</div>
	</div>
	<div class="text-center">
		<div>{{ $site->title }}</div>
		<div>(only you can see this panel)</div>
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

	<button class="absolute bottom-0 px-4 py-0 translate-y-full rounded-b-lg right-8 bg-primary" @click="toggle">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transition" :class="show || 'rotate-180'">
			<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
		</svg>
	</button>
</header>
