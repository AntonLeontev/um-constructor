@extends('layouts.constructor')

@section('title', $site->title)

@section('content')
	<div class="w-full" 
		@keyup.escape.window="cleanSelection"
		x-data="blocks"
	>
		<template x-for="block in blocks">
			<div 
				:id="'block'+block.id" 
				@select="select"
				@block-update.window="refresh"
				x-data="{
					id: block.id,
					html: '',

					init() {
						this.getHtml()
					},
					refresh() {
						if (this.$event.detail == this.id) {
							this.getHtml()
						}
					},
					getHtml() {
						axios
							.get(route('blocks.view', block.id))
							.then(resp => this.html = resp.data.html)
					},
				}"
				x-html="html"
			></div>
		</template>

		@include('constructor.partials.text-panel')
		@include('constructor.partials.image-panel')
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('blocks', () => ({
				blocks: @json($site->blocks),
				selected: {},
				selectedTextData: '',
				
				select() {
					this.selected = {
						id: this.$event.target.dataset.id,
						key: this.$event.target.dataset.key,
						type: this.$event.target.dataset.type,
					}

					if (this.$event.target.dataset.type === 'string') {
						this.selectedTextData = this.$event.target.innerText
					}
				},
				cleanSelection() {
					this.selected = {}
					this.selectedTextData = ''
				},
			}))
		})
	</script>
@endsection
