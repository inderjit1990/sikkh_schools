<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sikh Schools Management' }}</title>
    <link rel="icon" href="{{ asset('logo/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.min.css"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .glass { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .bg-sikh-blue { background-color: #1a365d; }
        .text-sikh-gold { color: #d97706; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-900 overflow-x-hidden">
    @include('partials.header')
    @include('partials.messages')
    <main class="min-h-screen animate__animated animate__fadeIn">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>