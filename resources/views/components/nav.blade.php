<nav x-data="{ open: false }"
    class="bg-gray-800 fixed w-full z-20 top-0 left-0 border-gray-200 px-2 sm:px-4 py-2.5 text-white">
    <div class="container flex flex-wrap justify-between items-center">
        <a href="/">
            <span class="self-center text-xl font-semibold whitespace-nowrap">
                {{ $data['title'] }}
            </span>
        </a>

        <!-- Personalized greeting -->
        @if (Auth::check())
            <span
                class="self-center text-sm font-semibold whitespace-nowrap -mr-20 bg-green-500 text-white px-2 py-1 rounded">
                Welcome, {{ explode(' ', Auth::user()->name)[0] }}
            </span>
        @endif

        <!-- Hamburger button: menu -->
        <button @click="open = !open" :class="{ 'bg-gray-600': open }" data-collapse-toggle="navbar-main"
            class="md:hidden h-12 w-12 rounded">
            <i class="material-icons text-white">menu</i>
        </button>

        <div x-show="open" class="w-full md:block md:w-auto" id="navbar-main">
            <x-items />
        </div>

        <div class="hidden w-full md:block md:w-auto" id="navbar-main">
            <x-items />
        </div>
    </div>

</nav>
