@props([
	'data',
	'block',
	'key',
	'alt' => 'image',
])

<img 
	{{ $attributes->merge(['class' => 'c-image']) }}
	src="{{ data_get($data, 'image.value') }}"
	data-width="{{ data_get($data, 'image.width') }}" 
	data-height="{{ data_get($data, 'image.height') }}" 
	alt="{{ $alt }}"
	data-type="image" 
	data-id="{{ $block->id }}" 
	data-key="{{ $key }}" 
	@click="$dispatch('select')"
>
