{{-- <nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="{{ asset('images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0">
        <a href="/" class="text-xs font-bold uppercase">Home Page</a>
        @if (!auth()->check())
            |
            <a href="{{ route('get.login') }}" class="text-xs font-bold uppercase">Login</a>
            |
            <a href="{{ route('get.register') }}" class="text-xs font-bold uppercase">Register</a>
        @else
            |

            <h3 class="inline-block text-blue-500">{{ auth()->user()->acsr_full_name }}</h3>

            |

            <form method="POST" action="{{ route('post.logout') }}" class="inline-block text-red-500">
                @csrf

                <button type="submit">Logout</button>
            </form>
        @endif
    </div>
</nav> --}}



<nav class="bg-white border-gray-200 dark:bg-gray-900 shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/" class="flex items-center">
          <img src="{{ asset('images/logo.svg') }}" class="mr-3" alt="BG" width="165" height="16" />
      </a>

      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>

      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
          </li>

          @if(!auth()->check())
            <li>
                <a href="{{ route('get.register') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
            </li>

            <li>
                <a href="{{ route('get.login') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
            </li>
          @else
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ auth()->user()->acsr_full_name }}</a>
          </li>

        <li>
            <form method="POST" action="{{ route('post.logout') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                @csrf

                <button type="submit">Logout</button>
            </form>
        </li>
          @endif
        </ul>
      </div>
    </div>
</nav>
