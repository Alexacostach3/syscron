<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
             
        <!-- SI DESEO CARGAR PAQUETES ANTES DE QUE SE CARGUEN LOS ARCHIVOS JS PUEDO IMPORTAR DE LAS 2 SIGUIENTES FORMAS -->
        <!-- <link rel="stylesheet" href="{{ mix('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}"> -->
        <!-- @vite('node_modules/bootstrap/dist/css/bootstrap.min.css') -->
        <!--IMPORTE ARCHIVO DE BOOTSTRAP  -->

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
        
    </body>
</html>
