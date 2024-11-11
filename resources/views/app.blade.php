<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>api Practice</title>
        @vite(['resources/js/app.ts', 'resources/css/app.css'])
	</head>
	<body>
		<div id="app">
		</div>
	</body>
</html>
