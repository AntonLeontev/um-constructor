@extends('layouts.app')

@section('title', $site->title)

@section('content')
	<div class="container px-2 mx-auto mt-10" x-data="site">
		<div class="flex gap-x-5">
			<div class="">
				<ul class="sticky w-56 top-5 menu bg-base-200 rounded-box gap-y-1">
					<li>
						<a :class="activeMenu === 'general' && 'active'" @click="activeMenu = 'general'">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 01-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 11-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 016.336-4.486l-3.276 3.276a3.004 3.004 0 002.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852z" /><path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008z" /></svg>
							General
						</a>
					</li>
					<li>
						<a :class="activeMenu === 'domains' && 'active'" @click="activeMenu = 'domains'">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>
							Domains
						</a>
					</li>

					<div class="my-1 divider"></div> 

					<li>
						<a href="{{ route('constructor', $site->id) }}" class="border border-primary hover:bg-primary">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
							Edit in constructor
						</a>
					</li>
				</ul>
			</div>
			<div class="w-full">
				<div class="relative w-full" x-data="general" x-show="activeMenu === 'general'" x-cloak x-transition>
					<h2 class="mb-3 text-2xl text-bold">General</h2>

					<form x-ref="generalForm">
						<input type="hidden" name="site_id" :value="site.id">

						<div class="w-full form-control">
							<label class="label">
								<span class="label-text">Meta title</span>
							</label>
							<input 
								type="text" 
								name="title" 
								placeholder="Meta title" 
								class="w-full input input-bordered input-primary" 
								:value="site.general?.title" 
								@change="submit"
							/>
						</div>
	
						<div class="w-full form-control">
							<label class="label">
								<span class="label-text">Meta description</span>
							</label>
							<textarea 
								type="text" 
								name="description" 
								placeholder="Meta description" 
								class="w-full textarea textarea-bordered textarea-primary"
								:value="site.general?.description"
								@change="submit"
							></textarea>
						</div>
	
						<div class="w-full form-control">
							<label class="label">
								<span class="label-text">Scripts before &lt;/head&gt; tag</span>
							</label>
							<textarea 
								name="head_scripts" 
								placeholder="With &lt;script&gt; tag" 
								class="w-full textarea textarea-bordered textarea-primary"
								:value="site.general?.head_scripts" 
								@change="submit"
							></textarea>
						</div>
	
						<div class="w-full form-control">
							<label class="label">
								<span class="label-text">Scripts before &lt;/body&gt; tag</span>
							</label>
							<textarea 
								name="body_scripts" 
								placeholder="With &lt;script&gt; tag" 
								class="w-full textarea textarea-bordered textarea-primary"
								:value="site.general?.body_scripts" 
								@change="submit"
							></textarea>
						</div>
					</form>
				</div>
				<script>
					document.addEventListener('alpine:init', () => {
						Alpine.data('general', () => ({
							submit() {
								let data = new FormData(this.$refs.generalForm);
								axios
									.put(route('generals.update', this.site.general.id), {
										site_id: data.get('site_id'),
										title: data.get('title'),
										description: data.get('description'),
										head_scripts: data.get('head_scripts'),
										body_scripts: data.get('body_scripts'),
									})
									.then(response => {
										this.$dispatch('toast-success', {message: 'Saved', delay: 1000})
									})
									.catch(error => {
										this.$dispatch('toast-error', error.response.data.message)
									})
							},
						}))
					})
				</script>

				<div class="" x-show="activeMenu === 'domains'" x-cloak x-transition>
					<h2 class="mb-3 text-2xl text-bold">Domains</h2>

					@foreach ($site->domains as $domain)
						<p>{{ $domain->title }}</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('site', () => ({
				site: @json($site),
				activeMenu: 'general',
			}))
		})
	</script>
@endsection
