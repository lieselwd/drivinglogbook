<x-layouts.default>
    <x-slot:pageTitle>
        {{ $drawerPageTitle ?? 'Driving Logbook' }}
    </x-slot:pageTitle>
    <div class="drawer sm:drawer-open">
        <input id="primary-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Navbar -->
            <nav class="navbar w-full bg-base-300">
                <label for="primary-drawer" aria-label="open sidebar" class="btn btn-square btn-ghost">
                    <!-- Sidebar toggle icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M9 4v16"></path><path d="M14 10l2 2l-2 2"></path></svg>
                </label>
                <div class="px-4">{{ $navTitle ?? 'No nav title' }}</div>
                <div class="flex-1 px-10">
                    @session('nav-alert-type')
                        <x-alert type="{{ session('nav-alert-type') }}" message="{{ session('nav-alert-message') }}"/>
                    @endsession
                </div>
                <div class="flex gap-2">
{{--                    <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />--}}
                    @auth
                    <div class="dropdown dropdown-end">
                        <div class="hidden md:inline">
                            {{ auth()->user()->name }}
                        </div>
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full" style="margin: 8px 0 0 7px;">
                                <svg xml ns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </div>
                        <ul
                            tabindex="-1"
                            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                            <li>
                                <a class="justify-between">
                                    Profile
                                    <span class="badge">New</span>
                                </a>
                            </li>
                            <li><a>Settings</a></li>
                            <li>
                                <form id="drawer_logout" action="{{ route('user.auth.logout') }}" method="post">
                                    @csrf
                                    <a href="javascript:{}" onclick="document.getElementById('drawer_logout').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                        <a class="btn btn-secondary" href="{{ route('user.auth.login') }}">Login</a>
                    @endauth
                </div>
            </nav>
            <!-- Page content here -->
            <div class="p-4">
                {{ $slot }}
            </div>
        </div>

        <div class="drawer-side is-drawer-close:overflow-visible">
            <label for="primary-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <div class="flex min-h-full flex-col items-start bg-base-200 is-drawer-close:w-14 is-drawer-open:w-64">
                <!-- Sidebar content here -->
                <ul class="menu w-full grow">
                    <!-- List item -->
                    <li>
                        <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard*') ? 'bg-primary' : '' }} is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Dashboard">
                            <!-- Home icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                            <span class="is-drawer-close:hidden">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logbook.all-entries') }}" class="{{ request()->is('logbook/all-entries') ? 'bg-primary' : '' }} is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="All entries">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="my-1.5 inline-block size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                            </svg>
                            <span class="is-drawer-close:hidden">All entries</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vehicles.all-vehicles') }}" class="{{ request()->is('vehicles*') ? 'bg-primary' : '' }} is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Vehicles">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="my-1.5 inline-block size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>
                            <span class="is-drawer-close:hidden">Vehicles</span>
                        </a>
                    </li>
                    <!-- List item -->
                    <li>
                        <button class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Settings">
                            <!-- Settings icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M20 7h-9"></path><path d="M14 17H5"></path><circle cx="17" cy="17" r="3"></circle><circle cx="7" cy="7" r="3"></circle></svg>
                            <span class="is-drawer-close:hidden">Settings</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.default>
