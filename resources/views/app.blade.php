<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <link rel="preload" href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2" as="font" type="font/woff2" crossorigin>
<head>
    @routes
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Detección de modo oscuro del sistema -->
    <script>
        (function() {
            const appearance = '{{ $appearance ?? 'system' }}';

            if (appearance === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    <!-- Estilo para el fondo según el tema -->
    <style>
        html {
            background-color: #ffffff; /* Blanco por defecto */
        }

        html.dark {
            background-color: #1b1b18; /* Oscuro por defecto */
        }
    </style>

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @routes
    @vite(['resources/js/app.ts']) <!-- Asegúrate de que coincida con vite.config.js -->
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
    <div id="app" data-user="{{ auth()->check() ? json_encode(auth()->user()) : 'null' }}">
    </div>
</body>

</html>