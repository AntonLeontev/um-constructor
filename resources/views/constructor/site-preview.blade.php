@extends('layouts.site')

@section('title', $site->general->title ?? 'Title')

@section('description', $site->general->description)

@section('head_scripts')
	{!! $site->general->head_scripts !!}
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
			{!! $block->class->view($block->getSavedData()) !!}
		@endforeach
	@endif
@endsection

@section('body_scripts')
	{!! $site->general->body_scripts !!}
@endsection
