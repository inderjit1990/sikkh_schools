@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center py-20">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border border-slate-100 animate__animated animate__zoomIn">
        <h2 class="text-3xl font-bold text-sikh-blue mb-2 text-center">Register Your School</h2>
        <p class="text-slate-500 text-center mb-8">Join the network of modern Sikh institutions.</p>
        
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-semibold mb-1">School Name</label>
                <input type="text" class="w-full px-4 py-3 rounded-lg border focus:ring-2 focus:ring-amber-500 outline-none transition" placeholder="e.g. Khalsa Academy">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Subdomain Name</label>
                <div class="flex">
                    <input type="text" class="w-full px-4 py-3 rounded-l-lg border focus:ring-2 focus:ring-amber-500 outline-none transition" placeholder="school-code">
                    <span class="bg-slate-100 px-4 py-3 rounded-r-lg border-y border-r font-medium text-slate-500">.sikhschools.com</span>
                </div>
            </div>
            <button class="w-full bg-sikh-blue text-white py-4 rounded-lg font-bold text-lg hover:bg-slate-800 transition mt-6">Create School Instance</button>
        </form>
    </div>
</div>
@endsection