<div 
	class="w-full" 
	x-data="preview" 
	x-show="view"
	@value-updated.window="updateValue"
	@image-updated.window="updateImage"
>
    <h3 class="mb-3 text-center text-[25px]">Preview</h3>

    <div class="border-2" x-html="view" x-ref="preview">

        {{-- <div class="relative flex aspect-[1200/500] items-center px-[5%]">
            <div class="relative flex flex-col justify-center w-full @container">
                <textarea
                    class="relative z-10 mb-[3%] bg-transparent text-[100%] @5xl:text-[3rem] font-bold uppercase focus-visible:outline-none max-w-[50%] resize-none overflow-hidden"
                    x-model="title"></textarea>
                <textarea class="relative z-10 mb-[3%] bg-transparent text-[60%] focus-visible:outline-none max-w-[50%] resize-none"
                    x-model="subtitle"></textarea>	
                <input class="relative z-10 w-[40%] bg-black text-center text-[70%] text-white uppercase focus-visible:outline-none" x-model="button">
                <img class="bg-red absolute right-0 z-0 aspect-[700/300] w-[70%]" :src="image" alt="Picture">
            </div>
        </div> --}}

    </div>

	<div class="flex justify-between mb-6">
		<button class="mt-3 btn" @click="fullscreen = true">Fullscreen</button>
		<a class="mt-3 btn" href="{{ route('sites.show', $site->id) }}" target="_blank">Open site</a>
	</div>

	<div 
		class="fixed top-0 bottom-0 right-0 left-0 z-30 flex justify-center items-center bg-[#000000cf]"
		x-show="fullscreen"
		style="display: none"
	>
		<button class="absolute top-1 right-1 btn btn-circle btn-primary" @click="fullscreen = false">
			<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
		</button>

		<div class="w-full" x-html="view">

			{{-- <div class="relative flex aspect-[1200/500] items-center px-[5%] bg-white">
				<div class="relative flex flex-col justify-center w-full @container">
					<textarea
						class="relative z-10 mb-[3%] bg-transparent text-[100%] @5xl:text-[3rem] font-bold uppercase focus-visible:outline-none max-w-[50%] resize-none overflow-hidden"
						x-model="title"></textarea>
					<textarea 
						class="relative z-10 mb-[3%] bg-transparent text-[60%] @5xl:text-[1.8rem] focus-visible:outline-none max-w-[50%] resize-none"
						x-model="subtitle"></textarea>
					<input class="relative z-10 w-min bg-black text-center text-[70%] @5xl:text-[2.1rem] uppercase text-white focus-visible:outline-none" x-model="button">
					<img class="bg-red absolute right-0 z-0 aspect-[700/300] w-[70%]" :src="image" alt="Picture">
				</div>
			</div> --}}

		</div>
	</div>

</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('preview', () => ({
            view: '',
			fullscreen: false,

			init() {
				this.$watch('selectedBlock', block => this.update(block))
			},
			update(block) {
				axios
					.get(route('blocks.preview', block.id))
					.then(response => this.view = response.data.html)
					.catch(error => {
						this.$dispatch('toast', {type: 'error', message: error.response.data.message})
					})
			
			},
			updateValue() {
				this.$refs.preview.querySelector(`[data-key="${this.$event.detail.key}"]`).innerText = this.$event.detail.value;
			},
			updateImage() {
				this.$refs.preview.querySelector(`[data-key="${this.$event.detail.key}"]`).src = this.$event.detail.value + '?' + new Date().getTime();
			},
        }))
    })
</script>
