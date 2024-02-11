<div class="flex flex-col w-[200px] border-r p-1" x-data="siteBlocks">
	<div class="flex flex-col gap-1 overflow-auto basis-auto">
		<template x-for="block in siteBlocks">
			<div 
				class="relative p-1 transition border cursor-pointer group" 
				:class="selectedBlock?.class === block.class && 'bg-primary'"
				@click="selectedBlock = block"
			>
				<img :src="block.class.image" alt="preview">
				<p class="mt-2 text-center" x-text="block.title"></p>
				
				<button class="absolute transition opacity-0 group-hover:opacity-100 top-1 left-1 btn btn-ghost btn-circle btn-sm" @click.stop="deleteSiteBlock(block.id)">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
					</svg>
				</button>
			</div>
		</template>
	</div>
	<div class="flex justify-center py-2">
		<button class="btn btn-sm btn-success" @click="blocks_choice.showModal()">
			{{ __('constructor.add block') }}
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
			</svg>
		</button>
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
									:class="selected?.class === block.class && 'bg-primary'"
									@click="selected = block"
									@dblclick="addBlock"
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
				<button type="submit" class="btn btn-accent btn-sm" :disabled="!selected" @click="addBlock">
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
		Alpine.data('siteBlocks', () => ({
			blocksCategories: @json(blocks_by_categories()),
			siteBlocks: @json($site->blocks),
			selected: null,

			addBlock() {
				axios
					.post(route('sites.blocks.store', this.siteId), {
						class: this.selected.class,
						title: this.selected.title,
					})
					.then(response => {
						this.siteBlocks.push(response.data);
						blocks_choice.close();
						this.selected = null;
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
						let block = this.siteBlocks.find(el => el.id === id);
						let index = this.siteBlocks.indexOf(block);
						this.siteBlocks.splice(index, 1);
						blocks_choice.close();
						this.selectedBlock = null;
					})
					.catch(error => {
						alert('Error!');
						console.log(error);
					})
			},
		}))
	})
</script>


