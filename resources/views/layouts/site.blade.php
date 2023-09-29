<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

		@yield('head_scripts')
		<style>
			* {
				margin: 0;
				padding: 0;
			}
		</style>
    </head>
    <body class="min-h-screen">

		@yield('content')
		
    </body>
</html>
