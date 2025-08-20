<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="">
{{--data-bs-theme="dark"--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
{{--    @fluxAppearance--}}
{{--    @livewireStyles--}}

</head>
<body>

@include('parcial.nav')

<!-- Page content-->
<div class="container">
    <div class="text-left mt-5">

        {{ $slot }}



    </div>
</div>



@fluxScripts
@livewire('wire-elements-modal')
@livewireScripts

</body>
<script>

    document.getElementById('themingSwitcher').addEventListener('click',()=>{
        if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
            document.documentElement.setAttribute('data-bs-theme','light')
        }
        else {
            document.documentElement.setAttribute('data-bs-theme','dark')
        }
    })

</script>

</html>




