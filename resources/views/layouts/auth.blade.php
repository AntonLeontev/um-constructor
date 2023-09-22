<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="cupcake">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | UM</title>

		<style>
			[x-cloak] {display: none;}
		</style>
		
		@routes
		@vite(['resources/css/app.css', 'resources/js/app.js'])

		@yield('head_scripts')
    </head>
    <body class="min-h-screen">
		
		@yield('content')
		@yield('body_scripts')
    </body>
</html>
