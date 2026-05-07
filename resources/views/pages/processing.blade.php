@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-slate-50">

    <div class="bg-white p-10 rounded-3xl shadow-xl text-center max-w-lg w-full">

        <div class="animate-spin rounded-full h-20 w-20 border-b-4 border-blue-600 mx-auto mb-6"></div>

        <h1 class="text-3xl font-bold text-slate-800 mb-4">
            Creating Your School
        </h1>

        <p class="text-slate-500 mb-6">
            Please wait while we setup your school portal,
            database schema, migrations and configurations.
        </p>

        <div id="status-box" class="text-sm text-slate-400">
            Processing...
        </div>

    </div>

</div>

<script>

async function checkStatus() {

    const response = await fetch("{{ route('tenant.status', $school->id) }}");

    const data = await response.json();

    if (data.status === 'completed') {

        window.location.href = data.redirect;

    } else if (data.status === 'failed') {

        document.getElementById('status-box').innerHTML =
            '<span class="text-red-500">School setup failed.</span>';

    } else {

        setTimeout(checkStatus, 3000);
    }
}

checkStatus();

</script>

@endsection