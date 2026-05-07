@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">
    
    <div class="bg-white shadow-2xl rounded-3xl p-10 max-w-lg w-full text-center border border-slate-100">

        <div class="mb-6">
            <div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-10 w-10 text-green-600" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <h1 class="text-3xl font-bold text-slate-800 mb-4">
            Email Verified Successfully 🎉
        </h1>

        <p class="text-slate-500 mb-6">
            Your school instance has been created successfully.
        </p>

        <div class="bg-slate-100 rounded-xl p-4 mb-6">
            <p class="text-sm text-slate-500 mb-2">Your School URL</p>

            <a href="{{ $url }}" 
               target="_blank"
               class="text-lg font-semibold text-blue-600 break-all hover:underline">
                {{ $url }}
            </a>
        </div>

        <a href="{{ $url }}"
           target="_blank"
           class="inline-block bg-sikh-blue text-white px-6 py-3 rounded-xl font-semibold hover:bg-slate-800 transition">
            Open School Portal
        </a>

    </div>

</div>

@endsection