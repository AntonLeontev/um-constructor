<div x-data="neural">
	<x-shared.tabs class="py-5">
		<a class="transition tab tab-lg" :class="tab === 'text' && 'tab-active'" @click="tab = 'text'" x-show="neuralText">
			Text
		</a>
		<a class="transition tab tab-lg" :class="tab === 'pic' && 'tab-active'" @click="tab = 'pic'" x-show="neuralImage">
			Images
		</a>
	</x-shared.tabs>
	
	<div class="mx-auto border shadow card" x-show="neuralText || neuralImage">
		<div x-show="tab === 'text'" x-transition x-html="neuralText"></div>
		
		<div class="" x-show="tab === 'pic'" x-transition x-html="neuralImage"></div>
	</div>
</div>

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('neural', () => ({
			tab: 'text',
			neuralText: null,
			neuralImage: null,
			
			init() {
				this.$watch('selectedBlock', (block) => {
					axios
						.get(route('blocks.neural-text', block.id))
						.then(response => this.neuralText = response.data.html)
						.catch(error => this.$dispatch('toast-error', error.response.data.error))

					axios
						.get(route('blocks.neural-image', block.id))
						.then(response => this.neuralImage = response.data.html)
						.catch(error => this.$dispatch('toast-error', error.response.data.error))
				})
			},
		}))
	})
</script>
