@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

@if(session('url'))
    <div class="bg-blue-100 text-blue-700 p-3 rounded mb-4 text-center">
        Your school is live: 
        <a href="{{ session('url') }}" target="_blank" class="underline font-semibold">
            {{ session('url') }}
        </a>
    </div>
@endif