@props(['site' => null, 'contact' => null])
<!DOCTYPE html>
<html lang="id" class="scroll-smooth" suppressHydrationWarning>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $site['site_name'] ?? 'Pura Agung Kertajaya' }}</title>
    <meta name="description"
          content="Pura Agung Kertajaya adalah tempat suci umat Hindu di wilayah Tangerang yang menjadi pusat kegiatan spiritual, budaya, dan kebersamaan umat.">
    <meta name="keywords"
          content="Pura Agung Kertajaya, Hindu temple, Pura Tangerang, Tempat suci umat Hindu, Pura Agung">
    <link rel="icon" href="/favicon.ico">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $site['site_name'] ?? 'Pura Agung Kertajaya' }}">
    <meta property="og:description" content="Pura Agung Kertajaya adalah tempat suci umat Hindu di wilayah Tangerang.">
    <meta property="og:image" content="{{ asset($site['logo'] ?? 'pura-agung-kertajaya.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('pura-agung-kertajaya.jpg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans antialiased bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100 transition-colors duration-300">

<x-layout.navbar :site="$site"/>

<main class="min-h-screen">
    {{ $slot }}
</main>

<x-layout.footer :site="$site" :contact="$contact"/>
</body>
</html>
