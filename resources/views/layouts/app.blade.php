<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel From Scratch Blog</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    @stack('header')
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8 pt-4">
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

        @stack('script')
    </section>
</body>
</html>
