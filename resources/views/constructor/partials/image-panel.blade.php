<div id="image-panel"
	class="fixed bottom-0 top-0 right-0 flex flex-col gap-2 w-1/3 bg-white z-30 py-2 px-[30px] transition translate-x-full overflow-y-auto shadow-[-6px_0_8px_0_rgba(0,0,0,0.2)]"
	:class="selected.type === 'image' && 'transform-none'"
	x-data="{
		loading: false,

	}"
>
	<div>
		<button class="p-2 rounded-full bg-base-100" @click="cleanSelection">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
			</svg>
		</button>
	</div>
	<div class="flex flex-col h-full gap-2">
		<form enctype="multipart/form-data" x-data="{
			saveImage() {
				let data = new FormData(this.$event.target.closest('form'));
				axios
					.post(route('blocks.image-data.update', this.selected.id), data)
					.then(response => {
						this.$dispatch('block-update', this.selected.id)
						this.cleanSelection()
					})
					.catch(error => this.$dispatch('toast-error', error.response.data.message))
			},
		}">
			<div class="w-full">
				<label class="label">
					Upload image
				</label>
				<input type="file" class="w-full border-primary file-input file-input-primary" name="image" @change="saveImage">
				<input type="hidden" name="key" :value="selected.key">
			</div>
		</form>
		<button class="btn btn-sm" @click="image_generation_modal.showModal()">AI generation</button>
	</div>
</div>
