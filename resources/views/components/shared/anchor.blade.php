@props([
	'data',
	'block',
	'key',
])

<a 
	href="{{ data_get($data, "$key.value") }}"
	{{ $attributes->merge(['class' => 'c-text']) }}
	data-type="string" 
	data-id="{{ $block->id }}" 
	data-key="{{ $key }}" 
	@click.prevent="$dispatch('select')"
>
	{{ $slot }}
</a>
