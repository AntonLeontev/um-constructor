<div class="w-full p-2">
	@foreach ($data as $key => $value)
		@if ($types[$key] === App\Support\Enums\DataType::string)
			
			<div class="w-full" x-data="{
				input(){
					axios
						.put(route('blocks.string-data.update', this.selectedBlock.id), {
							key: this.$event.target.dataset.key,
							value: this.$event.target.value
						})
						.then(response => {
							this.$dispatch('value-updated', {key: this.$event.target.dataset.key, value: this.$event.target.value})
						})
						.catch(error => {
							this.$dispatch('toast', {type: 'error', message: error.response.data.message})
						})
				}
			}">
				<label class="label">
					{{ $labels[$key] ?? $key }}
				</label>
				<input 
					type="text" 
					class="w-full input input-primary" 
					name="{{ $key }}" 
					value="{{ $value }}" 
					data-key="{{ $key }}"
					@input.debounce.350ms="input"
				>
			</div>
	
		@endif

		@if ($types[$key] === App\Support\Enums\DataType::image)
			
			<div class="w-full">
				<label class="label">
					{{ $labels[$key] ?? $key }}
				</label>
				<input type="file" class="w-full file-input file-input-primary" name="{{ $key }}" value="{{ $value }}">
			</div>
	
		@endif
		
		@if ($types[$key] === App\Support\Enums\DataType::text)
			
			<div class="w-full">
				<label class="label">
					{{ $labels[$key] ?? $key }}
				</label>
				<textarea type="text" class="w-full textarea textarea-primary h-[200px]" name="{{ $key }}">{{ $value }}</textarea>
			</div>
	
		@endif
	@endforeach
</div>
