@extends('layouts.site')

@section('title', 'Title')

@section('content')
	@if ($site->blocks->isEmpty())
		<style>
			.notice {
				height: 100vh;
				display: flex;
				justify-content: center;
				align-items: center;
			}
		</style>
		<div class="notice">
			This site is blank. You can build it in the constructor
		</div>
	@else
		@foreach ($site->blocks->load('stringData') as $block) 
			{!! $block->class->view($block->getSavedData()) !!}
		@endforeach
	@endif
@endsection
