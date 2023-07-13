@extends('layouts.app')

@section('content')
    <main class="max-w-10xl mx-auto mt-6 lg:mt-20 space-y-6 bg-gray-50">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">

                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Forgot Password
                        </h1>

                        <hr>

                        @include('layouts.page_info')

                        <form class="space-y-4 md:space-y-6" action="{{ route('forgot-password.send-email') }}" method="POST">
                            @csrf

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Your Email <span class="text-red-500">*</span>
                                </label>

                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                @error('email')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
