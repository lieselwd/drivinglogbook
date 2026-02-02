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
            <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
            <div class="flex min-h-full flex-col items-start bg-base-200 is-drawer-close:w-14 is-drawer-open:w-64">
                <!-- Sidebar content here -->
                <ul class="menu w-full grow mt-1">
                    <!-- List item -->
                    <li>
                        <a href="{{ route('dashboard') }}" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Homepage">
                            <!-- Home icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 inline-block my-1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span class="is-drawer-close:hidden">Homepage</span>
                        </a>
                    </li>
                    <div class="divider" style="margin-top: 0.5px;"></div>
                    <li class="is-drawer-close:hidden menu-title">
                        Logbook
                    </li>
                    <li>
                        <a href="{{ route('logbook.create-entry') }}" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Create logbook entry">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 inline-block my-1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span class="is-drawer-close:hidden">Create logbook entry</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logbook.all-entries') }}" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Logbook entries">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 inline-block my-1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            <span class="is-drawer-close:hidden">Logbook entries</span>
                        </a>
                    </li>
                    <li class="is-drawer-close:hidden menu-title">
                        Vehicles
                    </li>
                    <li>
                        <button class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Your vehicles">
                            <!-- Settings icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 inline-block my-1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>

                            <span class="is-drawer-close:hidden">Your vehicles</span>
                        </button>
                    </li>
                    <li class="is-drawer-close:hidden">
                        <a href="#" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Add vehicle">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 inline-block my-1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span class="is-drawer-close:hidden">Add vehicle</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.default>
