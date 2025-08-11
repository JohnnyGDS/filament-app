<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />

	<title>{{ $page->title }}</title>

	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
		integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Main Styling -->
	@vite('resources/css/app.css')
	<style>
		:root {
			--color-primary: {{ $global_theme_color_primary }};
			--color-secondary: {{ $global_theme_color_secondary }};
		}
	</style>
</head>
