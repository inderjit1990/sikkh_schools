<header class="bg-primary text-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

        <div class="flex items-center gap-3">
            @if(app('tenant')->logo)
                <img src="{{ app('tenant')->logo }}" class="h-10">
            @endif

            <h1 class="text-xl font-bold">
                {{ app('tenant')->name }}
            </h1>
        </div>

        <nav class="space-x-6 font-medium">
            <a href="/" class="hover:underline">Home</a>
            <a href="/about" class="hover:underline">About</a>
            <a href="/posts" class="hover:underline">Posts</a>
            <a href="/login" class="hover:underline">Login</a>
        </nav>

    </div>
</header>