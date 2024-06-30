<x-layouts.app>
    <x-slot:styles>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/614482ff69.js" crossorigin="anonymous"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        @if (App::environment() == 'production')
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-TKZQY94QPJ"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());



                gtag('config', 'G-TKZQY94QPJ');
            </script>
        @endif
        <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">

        {{ isset($styles) ? $styles : '' }}


    </x-slot>

    <main class="overflow-x-hidden min-h-[640px]">
        @livewire('notifications')


        @include('livewire.web.partials.header')

        {{ $slot }}

        @include('livewire.web.partials.footer')
        {{-- @include('livewire.web.partials.scrollToTop') --}}
    </main>

    <x-slot:scripts>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true, // whether animation should happen only once - while scrolling down
            });
        </script>

        {{ isset($scripts) ? $scripts : '' }}
    </x-slot>


</x-layouts.app>