@extends('layouts.site')

@section('title', 'Title')

@section('content')
	@foreach ($site->blocks->load('stringData') as $block) 
		{!! $block->class->view($block->getSavedData()) !!}
	@endforeach
@endsection
