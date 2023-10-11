@props([
	'id',
	'min',
	'max',
	'value',
	'step',
	'name',
	'label' => '',
])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-y-2']) }} x-data="{value: {{ $value }},}">
	<div class="flex justify-between">
		<span>{{ $label }}</span>
		<input class="w-[50px] text-right focus-visible:outline-none" x-model="value">
	</div>
	<input 
		type="range" 
		min="{{ $min }}" 
		max="{{ $max }}" 
		class="range range-xs range-primary"
		name="{{ $name }}"
		x-model="value" 
	 /> 
</div>
