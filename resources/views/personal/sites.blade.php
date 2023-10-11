@extends('layouts.app')

@section('title', __('sites.title'))

@section('content')
    <div class="px-2" x-data="sites">

        <div class="">Your sites:</div>

        <div class="grid grid-cols-4 gap-4 mb-3 justify-items-center">
			<template x-for="site in sites">
				<x-personal.sites.site />
			</template>
        </div>

        <button class="btn btn-accent" onclick="add_site.showModal()">Add Site</button>

        <dialog id="add_site" class="modal">
            <div class="modal-box">
                <h3 class="mb-3 text-lg font-bold">Create new site</h3>
				<form class="flex flex-col gap-4" @submit.prevent="createSite">
					<input type="text" class="input input-primary" placeholder="Project name" name="title">
					<input type="submit" class="btn btn-accent" value="Create">
				</form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('sites', () => ({
				sites: @json($sites->items()),

				createSite() {
					let data = new FormData(this.$event.target);
					this.$event.target.reset();

					axios
						.post(route('sites.store'), data)
						.then(response => {
							this.sites.push(response.data);
							add_site.close();
						})
						.catch(error => {
							this.$dispatch('toast', {type: 'error', message: error.response.data.message})
						})
				},
				
			}))
		})
	</script>

@endsection
