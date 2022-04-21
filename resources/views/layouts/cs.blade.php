<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/icon.svg" type="image/x-icon" />

    <title>@yield('title') | Halaman CS JNE</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.cs.style')
    @stack('addon-style')
    
    {{-- React --}}
    @stack('prepend-react')
    @include('includes.cs.react')
    @stack('addon-react')
</head>

<body>
    {{-- Preloader --}}
    @include('includes.cs.preloader')

    {{-- Navbar --}}
    @include('includes.cs.navbar')

    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('includes.cs.footer')

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.cs.script')
    @stack('addon-script')
</body>

</html>
