@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-16">
    <h2 class="text-4xl font-bold mb-12 text-center text-sikh-blue">Latest Updates</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach(range(1, 6) as $i)
        <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition group">
            <div class="h-48 bg-slate-200 group-hover:scale-105 transition duration-500"></div>
            <div class="p-6">
                <span class="text-amber-600 text-sm font-bold uppercase">Community</span>
                <h3 class="text-xl font-bold mt-2 mb-3">Expanding our Digital Horizons for 2026</h3>
                <p class="text-slate-600 text-sm line-clamp-3">We are implementing new features to help schools track student volunteer hours for Sarbat Da Bhala initiatives.</p>
                <a href="#" class="inline-block mt-4 text-sikh-blue font-bold border-b-2 border-amber-500">Read More</a>
            </div>
        </article>
        @endforeach
    </div>
</div>
@endsection