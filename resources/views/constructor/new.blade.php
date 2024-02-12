@extends('layouts.constructor')

@section('title', $site->title)

@section('content')
	

	<div class="w-full" 
		x-data="blocks"
	>
		<template x-for="block in blocks">
			<div 
				:id="'block'+block.id" 
				@text-click="textClick"
				x-data="{
					html: '',

					init() {
						axios
							.get(route('blocks.view', block.id))
							.then(resp => this.html = resp.data.html)
					},
					textClick() {
						console.log('block ' + block.id + ', type ' + this.$event.detail.type);
						console.log(this.$event.target);
					},
				}"
				x-html="html"
			></div>
		</template>
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('blocks', () => ({
				blocks: @json($site->blocks),

				
			}))
		})
	</script>
@endsection
