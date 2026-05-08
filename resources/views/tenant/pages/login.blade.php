@extends('tenant.layouts.app')

@section('content')
<div class="flex justify-center py-20">

    <form class="bg-white p-8 rounded-xl shadow w-full max-w-md">

        <h2 class="text-2xl font-bold mb-6 text-primary text-center">
            Login
        </h2>

        <input type="email" placeholder="Email"
            class="w-full mb-4 p-3 border rounded">

        <input type="password" placeholder="Password"
            class="w-full mb-4 p-3 border rounded">

        <button class="w-full bg-primary text-white py-3 rounded">
            Login
        </button>

    </form>

</div>
@endsection