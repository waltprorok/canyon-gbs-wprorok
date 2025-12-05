<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-4 dark:border-neutral-700">
    <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <a class="flex-none font-semibold text-xl text-black focus:outline-hidden focus:opacity-80 dark:text-gray-500" href="{{ route('home') }}" aria-label="Brand">Canyon GBS App®</a>
        </div>
        <div id="hs-navbar-sticky-footer" class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow sm:block" aria-labelledby="hs-navbar-sticky-footer-collapse">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                <a class="font-medium text-blue-500 focus:outline-hidden" href="{{ route('home') }}" aria-current="page">Home</a>
                <a href="{{ route('students') }}" class="font-medium text-gray-600 hover:text-gray-400 focus:outline-hidden focus:text-gray-400 dark:text-neutral-400 dark:hover:text-neutral-500 dark:focus:text-neutral-500">Students</a>
                @auth
                    <a href="{{ route('logout') }}" class="font-medium text-gray-600 hover:text-gray-400 focus:outline-hidden focus:text-gray-400 dark:text-neutral-400 dark:hover:text-neutral-500 dark:focus:text-neutral-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="font-medium text-gray-600 hover:text-gray-400 focus:outline-hidden focus:text-gray-400 dark:text-neutral-400 dark:hover:text-neutral-500 dark:focus:text-neutral-500">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="font-medium text-gray-600 hover:text-gray-400 focus:outline-hidden focus:text-gray-400 dark:text-neutral-400 dark:hover:text-neutral-500 dark:focus:text-neutral-500">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>
</header>
