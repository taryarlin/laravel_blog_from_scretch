@extends('layouts.app')

@section('content')

<div class="max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 my-36 mx-auto text-center">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Verify Your Email</h5>

    <p class="mt-4 mb-3 font-normal text-gray-700 dark:text-gray-400">Please check your email and click on the verification link to verify your email address.</p>

    <a href="{{ route('verification.resend') }}" class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Resend Verification
    </a>
</div>

@endsection
