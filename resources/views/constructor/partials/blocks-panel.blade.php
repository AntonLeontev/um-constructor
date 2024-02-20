<div 
	id="blocksPanel" 
	class="fixed top-0 bottom-0 left-0 bg-base-200 flex flex-col w-[200px] border-r p-1 -translate-x-full transition shadow-xl z-20" 
	:class="show && '!transform-none'"
	x-data="blocksPanel"
	@click.outside="show = false"
	@block-selected="selectedBlock = $event.detail"
>
	@include('constructor.partials.blocks-list')
	
	<div class="flex justify-center py-2">
		<button class="btn btn-sm btn-success" @click="blocks_choice.showModal()">
			{{ __('constructor.add block') }}
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
			</svg>
		</button>
	</div>

	<div 
		class="absolute right-0 bottom-[20%] translate-x-full origin-bottom-left rotate-90 bg-accent cursor-pointer px-4 py-1 rounded-t-lg"
		@click="show = true"
	>
		Blocks
	</div>

	<dialog id="blocks_choice" class="modal">
		<div class="w-11/12 max-w-[50rem] modal-box">
			<div class="max-h-[70vh] overflow-auto">
				<template x-for="blocks, category in blocksCategories">
					<div class="">
						<h3 class="text-lg font-bold" x-text="category"></h3>
						<div class="grid grid-cols-5 gap-2 mb-3">
							<template x-for="block in blocks">
								<div 
									class="p-1 transition border cursor-pointer" 
									:class="selectedBlock?.class === block.class && 'bg-primary'"
									@click="selectedBlock = block"
								>
									<img :src="block.image" alt="preview">
									<p class="mt-2 text-center" x-text="block.title"></p>
								</div>
							</template>
						</div>
					</div>
				</template>
			</div>
			<div class="flex justify-center pt-1">
				<button type="submit" class="btn btn-accent btn-sm" :disabled="!selectedBlock" @click="addBlock">
					add
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
					</svg>
				</button>
			</div>
		</div>
		<form method="dialog" class="modal-backdrop">
			<button>close</button>
		</form>
	</dialog>
</div>

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('blocksPanel', () => ({
			show: true,
			blocksCategories: @json(blocks_by_categories()),
			selectedBlock: null,

			addBlock() {
				axios
					.post(route('sites.blocks.store', this.site.id), {
						class: this.selectedBlock.class,
						title: this.selectedBlock.title,
					})
					.then(response => {
						this.blocks.push(response.data);
						blocks_choice.close();
						this.selectedBlock = null;
					})
					.catch(error => {
						alert('Error!');
						console.log(error);
					})
			},
			deleteSiteBlock(id) {
				axios
					.delete(route('blocks.destroy', id))
					.then(response => {
						let block = this.blocks.find(el => el.id === id);
						let index = this.blocks.indexOf(block);
						this.blocks.splice(index, 1);
						blocks_choice.close();
						this.selectedBlock = null;
						this.$nextTick(() => this.$dispatch('refresh'))
					})
					.catch(error => {
						alert('Error!');
						console.log(error);
					})
			},
		}))
	})
</script>


