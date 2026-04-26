<nav class="sticky top-0 z-50 glass border-b border-slate-200 py-4">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            {{-- <div class="w-10 h-10 bg-sikh-blue rounded-lg flex items-center justify-center text-white font-bold">S</div> --}}
            <a href="/" class="text-decoration-none">
                <img src="{{ asset('logo/logo.png') }}" alt="Sikh Schools Logo" class="h-20 w-auto">
            {{-- <span class="text-xl font-bold tracking-tight text-sikh-blue">SikhSchools<span class="text-amber-600">SaaS</span></span> --}}
            </a>
        </div>
        <div class="hidden md:flex space-x-8 font-medium text-slate-600">
            <a href="/" class="hover:text-amber-600 transition">Home</a>
            <a href="/about" class="hover:text-amber-600 transition">Our Values</a>
            <a href="/posts" class="hover:text-amber-600 transition">News</a>
        </div>
        <a href="/register" class="bg-sikh-blue text-white px-6 py-2 rounded-full hover:bg-slate-800 transition shadow-lg">Get Started</a>
    </div>
</nav>