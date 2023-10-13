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
				<div class="relative w-full" x-data="general" x-show="activeMenu === 'general'" x-cloak>
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

				<div class="" x-show="activeMenu === 'domains'" x-cloak x-data="domains">
					<h2 class="mb-3 text-2xl text-bold">Domains</h2>

					<p>This site is available at the following links:</p>

					<div class="mb-5 overflow-x-auto">
						<table class="table lg:text-lg">
							<tbody>
								<template x-for="domain in site.domains">
									<tr>
										<td>
											<p x-text="domain.title"></p>
										</td>
										<td>
											<a :href="'http://' + domain.title" class="btn btn-base btn-sm" target="_blank">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
											</a>
										</td>
										<td>
											<template x-if="domain.is_technical">
												<p class="text-gray-400">Technical domain</p>
											</template>
										</td>
										<td class="flex justify-end">
											<template x-if="!domain.is_technical">
												<div class="dropdown dropdown-left">
													<label tabindex="0" class="m-1 btn btn-xs btn-ghost">
														<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" /></svg>
													</label>
													<ul tabindex="0" class="dropdown-content z-[1] menu flex flex-row flex-nowrap p-0 gap-x-2 shadow bg-base-100 rounded-box">
														<li>
															<a class="bg-error" @click="deleteDomain(domain)">
																<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
															</a>
														</li>
													</ul>
												</div>
											</template>
										</td>
									</tr>
								</template>
							</tbody>
						</table>
					</div>

					<div class="border collapse bg-base-200 border-primary">
						<input type="checkbox" class="peer" /> 
						<div class="flex items-center justify-center gap-2 collapse-title text-primary-content">
							Add domain
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>

						</div>
						<div class="collapse-content text-primary-content"> 
							<p>You can make the site accessible from your own domain. To do this, create a domain in the form below and change the NS settings at the registrar</p>
							<p>NS servers:</p>
							<ul class="p-2">
								<li>ns1.timeweb.ru </li>
								<li>ns2.timeweb.ru</li>
								<li>ns3.timeweb.org</li>
								<li>ns4.timeweb.org</li>
							</ul>

							<form class="flex items-end gap-3" @submit.prevent="submit">
								<div class="w-full form-control">
									<label class="label">
										<span class="label-text">New domain</span>
									</label>
									<input 
										type="text" 
										name="domain" 
										placeholder="mydomain.com" 
										class="w-full input input-bordered input-primary" 
									/>
								</div>

								<button type="submit" class="btn btn-primary">Add</button>
							</form>
						</div>
					</div>
				</div>
				<script>
					document.addEventListener('alpine:init', () => {
						Alpine.data('domains', () => ({
							submit() {
								axios
									.post(route('sites.domains.store', this.site.id), new FormData(this.$event.target))
									.then(response => {
										this.site.domains.push(response.data)
										this.$event.target.reset()
									})
									.catch(error => this.$dispatch('toast-error', error.response.data.message))
							},
							deleteDomain(domain) {
								axios
									.delete(route('domains.destroy', domain.id))
									.then(response => {
										let index = this.site.domains.indexOf(domain)
										this.site.domains.splice(index, 1)
									})
									.catch(error => this.$dispatch('toast-error', error.response.data.message))
							},
						}))
					})
				</script>
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
