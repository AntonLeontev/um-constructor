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
			html,
			body {
				height: 100%;
			}
		</style>
    </head>
    <body class="flex min-h-full flex-column">

		@yield('content')
		
    </body>
</html>
