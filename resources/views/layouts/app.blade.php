<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel From Scratch Blog</title>

    <link rel="stylesheet" href="{{ mix('css/tailwind.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <link rel="stylesheet" href="{{ mix('css/style.css') }}">

    @stack('header')
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8 pt-4">
        <div class="sass_test">
            <h3>Hello</h3>
        </div>

        @include('layouts.header')

        <div id="app">

            @yield('content')

        </div>

        @include('layouts.footer')

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

        <script src="{{ mix('js/app.js') }}"></script>

        <script src="{{ mix('js/script.js') }}"></script>

        @stack('script')
    </section>

        @if(session()->has('success'))
            <script>
                $.toast({
                    heading: 'Success',
                    text: "{{ session('success') }}",
                    icon: 'info',
                    loader: true,
                    loaderBg: '#9EC600',
                    position: 'top-right'
                })
            </script>
        @endif
</body>
</html>
