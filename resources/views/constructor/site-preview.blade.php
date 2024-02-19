@extends('layouts.site')

@section('title', $site->general->title ?? 'Title')

@section('description', $site->general->description)

@section('head_scripts')
	@unless (Route::is('sites.show'))
		{!! $site->general->head_scripts !!}
	@endunless
@endsection

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
			{!! $block->class->view($block->getSavedData(), $block) !!}
		@endforeach
	@endif
@endsection

@section('body_scripts')
	@unless (Route::is('sites.show'))
		{!! $site->general->body_scripts !!}
	@endunless
@endsection
