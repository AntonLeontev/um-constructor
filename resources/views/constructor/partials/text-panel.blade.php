<div id="text-panel"
	class="fixed bottom-0 top-0 right-0 flex flex-col gap-2 w-1/3 bg-primary z-30 py-2 px-[30px] transition translate-x-full"
	:class="selected.type === 'string' && 'transform-none'"
	x-data="{
		loading: false,

		saveText() {
			this.loading = true

			axios
				.put(route('blocks.string-data.update', this.selected.id), {
					key: this.selected.key, 
					value: this.selectedTextData.replace(/\n/gi, '<br>')
				})
				.then(resp => this.$dispatch('block-update', this.selected.id))
				.catch(error => {
					this.$dispatch('toast-error', error.response.data.message)
				})
				.finally(() => this.loading = false)
		}
	}"
>
	<div>
		<button class="p-2 rounded-full bg-base-100" @click="cleanSelection">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
			</svg>
		</button>
	</div>
	<div class="h-full">
		<textarea class="w-full mb-2 textarea min-h-36 h-1/2" x-model="selectedTextData"></textarea>
		<div class="flex gap-1 justify-evenly">
			<div class="relative flex items-center w-1/2 gap-1">
				<button class="w-full btn btn-accent btn-sm" @click="saveText">Save</button>
				<span class="absolute loading loading-bars loading-xs right-5" x-show="loading"></span>
			</div>
			<button class="btn btn-sm">AI generation</button>
		</div>
	</div>
</div>
