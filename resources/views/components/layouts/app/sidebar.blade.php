<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />


                @if(Auth::user()->hasRole(\App\Helpers\Roles::ADMINISTRATOR))

                    <a href="{{ route('admin.dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                        <x-app-logo />
                    </a>

                    <flux:navlist variant="outline">
                        <flux:navlist.group heading="Platform" class="grid">
                            <flux:navlist.item icon="home" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                        </flux:navlist.group>
                    </flux:navlist>
                @endif

                @if(Auth::user()->hasRole(\App\Helpers\Roles::STUDENT))

                    <a href="{{ route('student.dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                        <x-app-logo />
                    </a>

                    <flux:navlist variant="outline">
                        <flux:navlist.group heading="Platform" class="grid">
                            <flux:navlist.item icon="home" :href="route('student.dashboard')" :current="request()->routeIs('student.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                        </flux:navlist.group>
                    </flux:navlist>
                @endif




            @can('user management')

            <flux:navlist variant="outline">
                <flux:navlist.group heading="User Management" class="grid">
                    <flux:navlist.item icon="user" :href="route('admin.dashboard.users')" :current="request()->routeIs('admin.dashboard.users*')" wire:navigate>{{ __('Users') }}</flux:navlist.item>
                    @can('create users')
                @endcan
                </flux:navlist.group>
            </flux:navlist>

            @endcan

            @can('school management')

            <flux:navlist variant="outline">
                <flux:navlist.group heading="School Management" class="grid">
                 
                        <flux:navlist.item icon="user-group" :href="route('admin.dashboard.students')" :current="request()->routeIs('admin.dashboard.students*')" class="mb-2" wire:navigate>{{ __('Students') }}</flux:navlist.item>


                        <flux:navlist.item icon="home-modern" :href="route('admin.dashboard.classes')" :current="request()->routeIs('admin.dashboard.classes*')" class="mb-2" wire:navigate>{{ __('Classes') }}</flux:navlist.item>
           
                        <flux:navlist.item icon="book-open" :href="route('admin.dashboard.subjects')" :current="request()->routeIs('admin.dashboard.subjects*')" class="mb-2" wire:navigate>{{ __('Subjects') }}</flux:navlist.item>

                        <flux:navlist.item icon="bookmark-square" :href="route('admin.dashboard.marks')" :current="request()->routeIs('admin.dashboard.marks*')" class="mb-2" wire:navigate>{{ __('Marks') }}</flux:navlist.item>
           
                </flux:navlist.group>
            </flux:navlist>

            @endcan


            @can('manage settings')
                <flux:navlist variant="outline">
                    <flux:navlist.group heading="Records and Settings" class="grid">

                        <flux:navlist.item icon="chart-bar-square" :href="route('admin.dashboard.transactions')" :current="request()->routeIs('admin.dashboard.transactions*')" class="mb-2" wire:navigate>{{ __('Transactions') }}</flux:navlist.item>
                    
                        <flux:navlist.item icon="cog" :href="route('admin.dashboard.settings')" :current="request()->routeIs('admin.dashboard.settings*')" class="mb-2" wire:navigate>{{ __('System Settings') }}</flux:navlist.item>
    
            
                    </flux:navlist.group>
                </flux:navlist>
            @endcan
            


            <flux:spacer />

           {{--  <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist> --}}

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-zinc-900 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-zinc-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
