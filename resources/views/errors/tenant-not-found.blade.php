@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">

    <div class="bg-white shadow-xl rounded-3xl p-10 max-w-lg w-full text-center border">

        <h1 class="text-3xl font-bold text-red-500 mb-4">
            School Not Found
        </h1>

        <p class="text-slate-500 mb-6">
            This school is not registered or may have been removed.
        </p>

        <div class="bg-slate-100 p-4 rounded-xl mb-6">
            <p class="text-sm text-slate-600">
                If you are the owner, please register your school or contact administrator.
            </p>
        </div>

        <a href="{{env('APP_URL')}}/register"
           class="block bg-sikh-blue text-white py-3 rounded-lg font-semibold mb-3 hover:bg-slate-800 transition">
            Register Your School
        </a>

        <a href="{{env('APP_URL')}}"
           class="text-blue-600 underline text-sm">
            Go to Main Website
        </a>

    </div>

</div>

@endsection