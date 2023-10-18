<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

		<meta name="description" content="@yield('description')">
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

		<style>
			* {
				margin: 0;
				padding: 0;
			}
			html,
			body {
				height: 100%;
				font-family: 'Roboto', sans-serif;
			}
		</style>

		@yield('head_scripts')
    </head>
    <body class="flex min-h-full flex-column">

		@yield('content')
		
		@yield('body_scripts')
    </body>
</html>
