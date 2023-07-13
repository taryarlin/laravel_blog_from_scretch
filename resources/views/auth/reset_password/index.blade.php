@extends('layouts.app')

@section('content')
    <main class="max-w-10xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="w-full max-w-lg mx-auto">
            <form method="POST" action="{{ route('reset-password.reset') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                @csrf

                <h3 class="text-bold mb-3 text-2xl bold">Reset Password</h3>

                @include('layouts.page_info')

                <hr class="mb-3">

              <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Password <span class="text-red-500">*</span>
                </label>
                <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password">
              </div>

              <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Confirm Password <span class="text-red-500">*</span>
                </label>
                <input name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password">
              </div>

              <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                  Submit
                </button>
              </div>
            </form>
        </div>

    </main>
@endsection
