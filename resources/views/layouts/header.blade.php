<nav class="md:flex md:justify-between md:items-center">
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
</nav>
