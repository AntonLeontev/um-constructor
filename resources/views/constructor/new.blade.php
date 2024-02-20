@extends('layouts.constructor')

@section('title', $site->title)

@section('content')
	<div class="w-full" 
		@keyup.escape.window="cleanSelection"
		x-data="blocks"
	>
		<template x-for="block in blocks" x-key="block.id">
			<div 
				:id="'block'+block.id" 
				@select="select"
				@block-update.window="blockUpdate"
				@refresh.window="getHtml"
				x-data="{
					id: block.id,

					init() {
						this.getHtml()
					},
					blockUpdate() {
						if (this.$event.detail == this.id) {
							this.getHtml()
						}
					},
					getHtml() {
						axios
							.get(route('blocks.view', block.id))
							.then(resp => this.$el.innerHTML = resp.data.html)
					},
				}"
			></div>
		</template>

		@include('constructor.partials.text-panel')
		@include('constructor.partials.image-panel')
		@include('constructor.partials.text-generation-modal')
		@include('constructor.partials.image-generation-modal')
		@include('constructor.partials.blocks-panel')
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('blocks', () => ({
				site: @json($site),
				blocks: @json($blocks),
				selected: {},
				selectedTextData: '',
				selectedImage: '',
				
				select() {
					this.selected = {
						id: this.$event.target.dataset.id,
						key: this.$event.target.dataset.key,
						type: this.$event.target.dataset.type,
					}

					if (this.$event.target.dataset.type === 'string') {
						this.selectedTextData = this.$event.target.innerText
					}

					if (this.$event.target.dataset.type === 'image') {
						this.selectedImage = this.$event.target.getAttribute('src')
						this.selected.width = this.$event.target.dataset.width
						this.selected.height = this.$event.target.dataset.height
					}
				},
				cleanSelection() {
					this.selected = {}
					this.selectedTextData = ''
					this.selectedImage = ''
				},
			}))
		})
	</script>
@endsection
