@props([
	'name',
	'label' => null,
	'type' => 'text',
	'placeholder' => '',
	'value' => '',
	'min' => '',
	'max' => '',
	'required' => false,
])

<div {{ $attributes->merge(['class' => '']) }}>
	@if ($label)
		<label class="label">
			<span class="label-text">
				{{ $label }}
				@if ($required)
					<span class="text-error">*</span>
				@endif
			</span>
		</label>
	@endif
	<input 
		type="{{ $type }}" 
		placeholder="{{ $placeholder }}" 
		name="{{ $name }}" 
		value="{{ $value }}"
		class="w-full input input-bordered input-primary" 
		min="{{ $min }}"
		max="{{ $max }}"
		@required($required)
		autocomplete="off"
	/>
</div>
