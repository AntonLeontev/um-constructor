@extends('layouts.app')

@section('title', $site->title)

@section('content')
	<div class="px-2">
		<p>Domains:</p>

		@foreach ($site->domains as $domain)
			<p>{{ $domain->title }}</p>
		@endforeach
	</div>
@endsection
