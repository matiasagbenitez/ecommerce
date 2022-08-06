<header x-data="dropdown()" class="bg-neutral-600 sticky top-0 z-50">

    {{-- Barra superior --}}
    <div class="container flex items-center h-16 justify-between md:justify-start">

        {{-- Icono hamburguesa --}}
        <a x-on:click="show()" :class="{'bg-opacity-100 text-orange-500': open}"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-3 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full" href="#">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">Categories</span>
        </a>

        {{-- Logo --}}
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>

        {{-- Barra de búsqueda + botón --}}
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        {{-- Dropdown de autenticación --}}
        <div class="mx-4 relative hidden md:block">
            @auth
                {{-- USUARIO AUTENTICADO --}}
                <x-jet-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>

                </x-jet-dropdown>
            @else
                {{-- USUARIO NO AUTENTICADO --}}
                <x-jet-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>

                </x-jet-dropdown>
            @endauth
        </div>

        {{-- Logo carrito --}}
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>

    </div>

    {{-- Menú subcategorías --}}
    <nav id="navigation-menu" :class="{'block': open, 'hidden': !open}" class="bg-neutral-600 bg-opacity-25 w-full absolute hidden">

        {{-- DESKTOP MENU --}}
        <div class="container h-full hidden md:block">
            <div x-show="open" x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="text-neutral-500 hover:bg-orange-500 hover:text-white navigation-link">
                            <a class="py-2 px-4 text-sm flex items-center" href="#">
                                <span class="flex justify-center w-9">{!! $category->icon !!}</span>
                                {{ $category->name }}
                            </a>
                            <div class="bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden navigation-submenu">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-neutral-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>

        {{-- MOBILE MENU --}}
        <div class="bg-white h-full overflow-y-auto">

            {{-- Buscador --}}
            <div class="container my-2">
                @livewire('search')
            </div>

            {{-- Categorías --}}
            <p class=" container py-3 text-sm font-bold uppercase text-neutral-500">Categories</p>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-neutral-500 hover:bg-orange-500 hover:text-white">
                        <a class="py-2 px-4 text-sm flex items-center" href="#">
                            <span class="flex justify-center w-9">{!! $category->icon !!}</span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Opciones de usuarios --}}
            <p class=" container py-3 text-sm font-bold uppercase text-neutral-500">Users</p>

            @livewire('cart-mobile')

            @auth
                <a class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-orange-500 hover:text-white" href="{{ route('profile.show') }}">
                    <span class="flex justify-center w-9">
                        <i class="far fa-address-card"></i>
                    </span>
                    Profile
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"  class="w-full">
                        <p class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-orange-500 hover:text-white">
                            <span class="flex justify-center w-9">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            Logout
                        </p>
                    </button>
                </form>
            @else
                <a class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-orange-500 hover:text-white" href="{{ route('login') }}">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Login
                </a>
                <a class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-orange-500 hover:text-white" href="{{ route('register') }}">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    Register
                </a>
            @endauth

        </div>

    </nav>

</header>
