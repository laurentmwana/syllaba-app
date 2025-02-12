<nav x-data="{ open: false }" class="backdrop-blur bg-background/75 border-b  -mb-px sticky top-0 z-50 lg:mb-0">
    <!-- Primary Navigation Menu -->
    <div class="container">

        <div class="container-center">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            Tableau de bord
                        </x-nav-link>

                        <x-dropdown align="top" width="48" :isMenu="true">
                            <x-slot name="trigger">
                                Blog
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('#category.index')" :active="request()->routeIs('#category.index')">
                                    Categorie
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('#post.index')" :active="request()->routeIs('#post.index')">
                                    Article
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('#comment.index')" :active="request()->routeIs('#comment.index')">
                                    Commentaire
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>

                        <x-dropdown align="top" width="48" :isMenu="true">
                            <x-slot name="trigger">
                                Université
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('#faculty.index')" :active="request()->routeIs('#faculty.index')">
                                    Faculté
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('#department.index')" :active="request()->routeIs('#department.index')">
                                    Département
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('#option.index')" :active="request()->routeIs('#option.index')">
                                    Option
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('#level.index')" :active="request()->routeIs('#level.index')">
                                    Promotions
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('#student.index')" :active="request()->routeIs('#student.index')">
                                    Etudiants
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('#year-academic.index')" :active="request()->routeIs('#year-academic.index')">
                                    Année Académique
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>

                        <x-dropdown align="top" width="48" :isMenu="true">
                            <x-slot name="trigger">
                                UE
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link :href="route('#course.index')" :active="request()->routeIs('#course.index')">
                                    Cours
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('#professor.index')" :active="request()->routeIs('#professor.index')">
                                    Professeur
                                </x-dropdown-link>


                                <x-dropdown-link :href="route('#course-document.index')" :active="request()->routeIs('#course-document.index')">
                                    Support du cours
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('#tome.index')" :active="request()->routeIs('#tome.index')">
                                    Tome
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>

                        <x-dropdown align="top" width="48" :isMenu="true">
                            <x-slot name="trigger">
                                Autres
                            </x-slot>


                            <x-dropdown-link :href="route('#payment.index')" :active="request()->routeIs('#payment.index')">
                                Paiement
                            </x-dropdown-link>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('#user.index')" :active="request()->routeIs('#user.index')">
                                    Utilisateur
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('#contact.index')" :active="request()->routeIs('#contact.index')">
                                    Contact
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('#event.index')" :active="request()->routeIs('#event.index')">
                                    Evenement
                                </x-dropdown-link>


                                <x-dropdown-link :href="route('#new-letter.index')" :active="request()->routeIs('#new-letter.index')">
                                    NewLetter
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('#quiz.index')" :active="request()->routeIs('#quiz.index')">
                                    Quiz
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>

                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>

    </div>
</nav>