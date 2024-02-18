@props([
	'data',
	'block',
	'key',
])

<p 
	{{ $attributes->merge(['class' => 'c-text']) }}
	data-type="string" 
	data-id="{{ $block->id }}" 
	data-key="{{ $key }}" 
	@click="$dispatch('select')"
>
	{!! data_get($data, "$key.value") !!}
</p>
