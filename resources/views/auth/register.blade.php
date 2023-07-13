@extends('layouts.app')

@section('content')
    <main class="max-w-10xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="w-full max-w-lg mx-auto">
            <form method="POST" action="{{ route('post.register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                @csrf

                <h3 class="text-bold mb-3 text-2xl bold">Register</h3>

                <hr class="mb-3">

              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  First Name
                </label>
                <input name="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
              </div>

              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Last Name
                </label>
                <input name="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
              </div>

              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Email
                </label>
                <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="email" placeholder="Username">
              </div>

              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Phone
                </label>
                <input name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
              </div>

              <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Password
                </label>
                <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
              </div>

              <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Confirm Password
                </label>
                <input name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
              </div>

              <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                  Sign Up
                </button>

                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('forgot-password.index') }}">
                  Forgot Password?
                </a>
              </div>
            </form>
        </div>

    </main>
@endsection
