<ul x-data="blocksList"
	class="flex flex-col gap-1 overflow-auto basis-auto"
	@dragenter.stop.prevent="dropcheck++"
	@dragleave="dropcheck--;dropcheck || rePositionPlaceholder()" 
	@dragover.stop.prevent
	@dragend="revertState()" 
	@drop.stop.prevent="resetState()"
>
	<template x-for="(block, index) in blocks" :key="index">
		<li 
			:data-index="index"
			class="relative flex flex-col items-center p-1 transition border cursor-pointer group" 
			:class="{
				'opacity-25': indexBeingDragged == index,
				'bg-primary': selectedBlock?.id === block.id,
			}"
			@mousedown="setDraggable"
			@dragstart="dragstart"
			@dragend="dragend"
			@dragover="updateListOrder" 
			draggable="false"
			@click="selectedBlock = block"
		>
			<img :src="block.class.image" alt="preview">
			<p class="mt-2 text-center" x-text="block.title"></p>
			
			<button 
				class="absolute transition opacity-0 group-hover:opacity-100 top-1 left-1 btn btn-ghost btn-circle btn-sm" 
				@click.stop="deleteSiteBlock(block.id)"
			>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
				</svg>
			</button>
		</li>
	</template>
</ul>

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('blocksList', () => ({
			dropcheck: 0,
			originalIndexBeingDragged: null,
			indexBeingDragged: null,
			indexBeingDraggedOver: null,
			preDragOrder: [],

			dragstart(event) {
				// Store a copy for when we drag out of range
				this.preDragOrder = [...this.blocks];
				// The index is continuously updated to reorder live and also keep a placeholder
				this.indexBeingDragged = event.target.closest('li').dataset.index;
				// The original is needed for then the drag leaves the container
				this.originalIndexBeingDragged = event.target.closest('li').dataset.index;
				// Not entirely sure this is needed but moz recommended it (?)
				event.dataTransfer.dropEffect = "copy";
			},
			dragend(event) {
				this.$event.target.setAttribute('draggable', false)

				axios
					.patch(route('sites.reorder-blocks', this.site.id), {blocks: this.blocks})
					.then(response => {
						console.log(response.data)
						this.$dispatch('refresh')
					})
					.catch(error => this.$dispatch('toast-error', 'Error'))
			},
			updateListOrder(event) {
				// This fires every time you drag over another list item
				// It reorders the items array but maintains the placeholder
				if (this.indexBeingDragged) {
					this.indexBeingDraggedOver = event.target.closest('li').dataset.index;
					let from = this.indexBeingDragged;
					let to = this.indexBeingDraggedOver;

					if (this.indexBeingDragged == to) return;
					if (from == to) return;

					this.move(from, to);
					this.indexBeingDragged = to;
				}
			},
			// These are needed for the handle effect
			setDraggable(event) {
				event.target.closest("li").setAttribute("draggable", true);
			},
			resetState() {
				this.dropcheck = 0;
				this.indexBeingDragged = null;
				this.preDragOrder = [...this.blocks];
				this.indexBeingDraggedOver = null;
				this.originalIndexBeingDragged = null;
			},
			// This acts as a cancelled event, when the item is dropped outside the container
			revertState() {
				this.blocks = this.preDragOrder.length
					? this.preDragOrder
					: this.blocks;
				this.resetState();
			},
			// Just repositions the placeholder when we move out of range of the container
			rePositionPlaceholder() {
				this.blocks = [...this.preDragOrder];
				this.indexBeingDragged = this.originalIndexBeingDragged;
			},
			move(from, to) {
				let items = this.blocks;
				if (to >= items.length) {
					let k = to - items.length + 1;
					while (k--) {
						items.push(undefined);
					}
				}
				items.splice(to, 0, items.splice(from, 1)[0]);
				this.blocks = items;
			},
		}))
	})
</script>
