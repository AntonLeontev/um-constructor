@extends('layouts.constructor')

@section('title', $site->title)

@section('content')
	<div class="w-full" 
		@keyup.escape.window="cleanSelection"
		@block-selected.window="scrollToBlock"
		x-data="blocks"
	>
		<template x-for="block in blocks" x-key="block.id">
			<div class="relative"
				@select="select"
				@block-update.window="blockUpdate"
				
				x-data="{
					loading: false,

					blockUpdate() {
						if (this.$event.detail == block.id) {
							this.getHtml()
						}
					},
					getHtml() {
						this.loading = true
						axios
							.get(route('blocks.views'), {
								params: {blocks_ids: [block.id]}
							})
							.then(resp => {
								let html = resp.data.find(el => block.id == el.id).html
								this.blocks.find(el => block.id == el.id).html = html

								this.loading = false
							})
							.catch(error => {
								this.$dispatch('toast-error', error.message)
							})
					},
				}"
			>
				<div :id="'block'+block.id" x-ref="block" x-html="block.html"></div>
				<div 
					class="absolute top-0 bottom-0 left-0 right-0 z-10 flex items-center justify-center bootom-0 bg-base-100" 
					x-show="loading" 
					x-transition.opacity
					x-transition.duration.400ms
				>
					{{-- <span class="loading loading-bars loading-lg text-primary"></span> --}}
				</div>
			</div>
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
				
				init() {
					this.getAllBlocksHtml()
				},
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
				scrollToBlock() {
					let block = document.getElementById('block'+this.$event.detail.id)
					block.scrollIntoView({behavior: 'smooth'})
				},
				getAllBlocksHtml() {
					let ids = []

					this.blocks.forEach(el => ids.push(el.id))

					axios
						.get(route('blocks.views'), {
							params: {blocks_ids: ids}
						})
						.then(resp => {
							resp.data.forEach(el => {
								let block = this.blocks.find(block => el.id == block.id)

								block.html = el.html
							})
						})
						.catch(error => {
							this.$dispatch('toast-error', error.message)
						})
				},
			}))
		})
	</script>
@endsection
