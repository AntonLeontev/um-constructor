<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

		<meta name="description" content="@yield('description')">
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<style>
			[x-cloak] {display: none;}
		</style>
		
		@routes
		@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/site.css', 'resources/css/constructor.css'])

		@yield('head_scripts')
    </head>
    <body class="min-h-full">
		@include('constructor.partials.header')

		@yield('content')
		
		@yield('body_scripts')
    </body>
</html>
