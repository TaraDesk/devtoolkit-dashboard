<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>{{ $title }}</title>

    <!-- Styles / Scripts -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="h-screen overflow-hidden flex items-center justify-center">
    
    {{ $slot }}

    <script src="https://unpkg.com/lucide@latest"></script>
    <script> 
        lucide.createIcons();
    </script>
</body>

</html>