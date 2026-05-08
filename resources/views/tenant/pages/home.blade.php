@extends('tenant.layouts.app')

@section('content')

<section class="bg-primary text-white py-20 text-center">
    <h1 class="text-4xl font-bold mb-4">
        Welcome to {{ app('tenant')->name }}
    </h1>

    <p class="text-lg opacity-90">
        Empowering students with modern education.
    </p>
</section>

<section class="py-16 max-w-6xl mx-auto text-center">
    <h2 class="text-2xl font-bold text-primary mb-6">
        Our Features
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="p-6 bg-white rounded-xl shadow">
            <h3 class="font-semibold mb-2">Modern Classes</h3>
            <p class="text-gray-500">Smart classroom experience</p>
        </div>

        <div class="p-6 bg-white rounded-xl shadow">
            <h3 class="font-semibold mb-2">Qualified Teachers</h3>
            <p class="text-gray-500">Experienced faculty</p>
        </div>

        <div class="p-6 bg-white rounded-xl shadow">
            <h3 class="font-semibold mb-2">Digital Learning</h3>
            <p class="text-gray-500">Online resources & LMS</p>
        </div>

    </div>
</section>

@endsection