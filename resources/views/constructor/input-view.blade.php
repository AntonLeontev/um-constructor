<div class="w-full p-2">
	@foreach ($data as $key => $properties)
		@if ($properties['type'] === App\Support\Enums\DataType::string)
			
			<div class="w-full" 
			@insert-{{ $key }}.window="{{ $key }} = $event.detail"
			x-data="{
				{{ $key }}: '{{ $properties['value'] }}',

				init() {
					this.$watch('{{ $key }}', value => this.input(value))
				},
				input(value){
					axios
						.put(route('blocks.string-data.update', this.selectedBlock.id), {
							key: '{{ $key }}',
							value: value
						})
						.then(response => {
							this.$dispatch('value-updated', {key: '{{ $key }}', value: value})
						})
						.catch(error => {
							this.$dispatch('toast', {type: 'error', message: error.response.data.message})
						})
				}
			}">
				<label class="label">
					{{ $properties['label'] ?? $key }}
				</label>
				<input 
					type="text" 
					class="w-full input input-primary" 
					:value="{{ $key }}" 
					@input.debounce.350ms="input($el.value)"
				>
			</div>
	
		@endif

		@if ($properties['type'] === App\Support\Enums\DataType::image)
			
			<form enctype="multipart/form-data" x-data="{
				saveImage() {
					let data = new FormData(this.$event.target.closest('form'));
					axios
						.post(route('blocks.image-data.update', this.selectedBlock.id), data)
						.then(response => {
							this.$dispatch('image-updated', {key: '{{ $key }}', value: response.data})
						})
						.catch(error => this.$dispatch('toast-error', error.response.data.message))
				},
			}">
				<div class="w-full">
					<label class="label">
						{{ $properties['label'] ?? $key }}
					</label>
					<input type="file" class="w-full file-input file-input-primary" name="image" value="{{ $properties['value'] }}" @change="saveImage">
					<input type="hidden" name="key" value="{{ $key }}">
				</div>
			</form>
	
		@endif
		
		@if ($properties['type'] === App\Support\Enums\DataType::text)
			
			<div class="w-full">
				<label class="label">
					{{ $properties['value'] }}
				</label>
				<textarea type="text" class="w-full textarea textarea-primary h-[200px]" name="{{ $key }}">{{ $properties['value'] }}</textarea>
			</div>
	
		@endif
	@endforeach
</div>
