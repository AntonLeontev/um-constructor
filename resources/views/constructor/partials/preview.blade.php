<div 
	class="w-full p-1 border-b" 
	x-data="preview" 
	x-show="view"
	@value-updated.window="updateValue"
	@image-updated.window="updateImage"
	@color-updated.window="updateColor"
>
    <h3 class="mb-3 text-center text-[25px]">Preview</h3>

    <div class="border-2" x-html="view" x-ref="preview"></div>

	<div class="flex justify-center mb-6">
		<a class="mt-3 btn" href="{{ route('sites.show', $site->id) }}" target="_blank">Open site</a>
	</div>

</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('preview', () => ({
            view: '',

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
			updateColor() {
				this.$refs.preview.querySelector('section').style[this.$event.detail.css] = this.$event.detail.value;
			},
        }))
    })
</script>
