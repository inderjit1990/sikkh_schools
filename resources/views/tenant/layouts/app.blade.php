<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ app('tenant')->name }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Dynamic Theme --}}
    <style>
        :root {
            --primary: {{ app('tenant')->themeStyle->primary_color ?? '#1e3a8a' }};
            --secondary: {{ app('tenant')->themeStyle->secondary_color ?? '#f59e0b' }};
        }

        .bg-primary { background-color: var(--primary); }
        .text-primary { color: var(--primary); }

        .bg-secondary { background-color: var(--secondary); }
        .text-secondary { color: var(--secondary); }
    </style>
</head>

<body class="bg-gray-50">

    {{-- Header --}}
    @include('tenant.partials.header')

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('tenant.partials.footer')

</body>
</html>