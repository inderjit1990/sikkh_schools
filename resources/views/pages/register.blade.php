@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-20">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border border-slate-100">
        <h2 class="text-3xl font-bold text-sikh-blue mb-2 text-center">Register Your School</h2>
        <p class="text-slate-500 text-center mb-8">Join the network of modern Sikh institutions.</p>
        
        <form method="POST" action="{{ route('tenant.store.register') }}" id="schoolForm">
            @csrf

            {{-- School Name --}}
            <div>
                <label class="block text-sm font-semibold mb-1">School Name</label>
                <input type="text" name="name" id="school_name"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-amber-500 outline-none"
                    placeholder="e.g. Khalsa Academy">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Email Address</label>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-amber-500 outline-none"
                    placeholder="e.g. school@email.com">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Phone Number</label>
                <input type="tel" name="phone"
                    value="{{ old('phone') }}"
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-amber-500 outline-none"
                    placeholder="e.g. 9876543210">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-amber-500 outline-none"
                    placeholder="Enter password">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-amber-500 outline-none"
                    placeholder="Confirm password">
            </div>

            {{-- Domain --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Domain</label>
                <input type="text" name="domain"
                    value="{{ old('domain') }}"
                    class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-amber-500 outline-none"
                    placeholder="e.g. sikhschools.com">
                @error('domain')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subdomain --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Subdomain Name</label>
                <div class="flex">
                    <input type="text" name="subdomain" id="subdomain"
                        value="{{ old('subdomain') }}"
                        class="w-full px-4 py-3 rounded-l-lg border focus:ring-2 focus:ring-amber-500 outline-none"
                        placeholder="school-code" readonly>
                    <span class="bg-slate-100 px-4 py-3 rounded-r-lg border-y border-r text-slate-500">
                        {{ env('DOMAIN', '.sikhschools.com') }}
                    </span>
                </div>
                @error('subdomain')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="w-full bg-sikh-blue text-white py-4 rounded-lg font-bold text-lg hover:bg-slate-800 mt-6">
                Create School Instance
            </button>

        </form>
    </div>
</div>

{{-- JS for auto subdomain --}}
<script>
document.getElementById('school_name').addEventListener('input', function () {
    let value = this.value
        .toLowerCase()
        .replace(/[^a-z0-9\s]/g, '') // remove special chars
        .replace(/\s+/g, '-')        // spaces to dash
        .substring(0, 20);           // limit length

    document.getElementById('subdomain').value = value;
});
</script>

@endsection