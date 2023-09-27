<div class="w-full p-2">
	@foreach ($data as $key => $value)
		@if ($types[$key] === 'text')
			
			<div class="w-full">
				<label class="label">
					{{ $labels[$key] ?? $key }}
				</label>
				<input type="text" class="w-full input input-primary" name="{{ $key }}" value="{{ $value }}">
			</div>
	
		@endif
	@endforeach
</div>
