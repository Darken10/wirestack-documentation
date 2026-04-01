<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800" x-data="{ sidebarOpen: false }">

        <!-- Mobile sidebar backdrop -->
        <div
            x-show="sidebarOpen"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-black/50 lg:hidden"
            @click="sidebarOpen = false"
        ></div>

        <!-- Sidebar -->
        <aside
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
            class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-zinc-200 bg-zinc-50 transition-transform duration-300 ease-in-out dark:border-zinc-700 dark:bg-zinc-900 lg:translate-x-0"
        >
            <div class="flex grow flex-col gap-y-5 overflow-y-auto px-4 py-4">

                <!-- Logo + close button (mobile) -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" wire:navigate>
                        <x-app-logo class="size-8" href="#"></x-app-logo>
                    </a>
                    <button
                        @click="sidebarOpen = false"
                        class="rounded-lg p-1 hover:bg-zinc-100 dark:hover:bg-zinc-800 lg:hidden"
                    >
                        <x-heroicon-o-x-mark class="h-5 w-5 text-zinc-500" />
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex flex-1 flex-col gap-y-1">
                    <p class="mb-1 px-2 text-xs font-semibold text-zinc-500 dark:text-zinc-400">
                        Platform
                    </p>
                    <a
                        href="{{ route('dashboard') }}"
                        wire:navigate
                        @class([
                            'flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-medium transition-colors',
                            'bg-zinc-200 text-zinc-900 dark:bg-zinc-700 dark:text-white' => request()->routeIs('dashboard'),
                            'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white' => ! request()->routeIs('dashboard'),
                        ])
                    >
                        <x-heroicon-o-home class="h-5 w-5 shrink-0" />
                        Dashboard
                    </a>
                </nav>

                <!-- External links -->
                <div class="space-y-1">
                    <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-medium text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white">
                        <x-heroicon-o-folder class="h-5 w-5 shrink-0" />
                        Repository
                    </a>
                    <a href="https://laravel.com/docs/starter-kits" target="_blank" class="flex items-center gap-3 rounded-lg px-2 py-2 text-sm font-medium text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white">
                        <x-heroicon-o-book-open class="h-5 w-5 shrink-0" />
                        Documentation
                    </a>
                </div>

                <!-- User menu -->
                @auth
                <div x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex w-full items-center gap-2 rounded-lg px-2 py-2 text-sm font-medium hover:bg-zinc-100 dark:hover:bg-zinc-800"
                    >
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-neutral-200 text-sm font-semibold text-black dark:bg-neutral-700 dark:text-white">
                            {{ auth()->user()->initials() }}
                        </span>
                        <div class="grid flex-1 text-left">
                            <span class="truncate text-sm font-semibold text-zinc-900 dark:text-white">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs text-zinc-500">{{ auth()->user()->email }}</span>
                        </div>
                        <x-heroicon-o-chevron-up-down class="h-4 w-4 text-zinc-500" />
                    </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"
                        x-transition
                        class="absolute bottom-full left-0 mb-1 w-full overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-lg dark:border-zinc-700 dark:bg-zinc-900"
                    >
                        <a href="/settings/profile" wire:navigate class="flex items-center gap-2 px-3 py-2 text-sm text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-800">
                            <x-heroicon-o-cog-6-tooth class="h-4 w-4" />
                            Settings
                        </a>
                        <div class="border-t border-zinc-200 dark:border-zinc-700"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 px-3 py-2 text-sm text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-800">
                                <x-heroicon-o-arrow-right-start-on-rectangle class="h-4 w-4" />
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </aside>

        <!-- Mobile header -->
        <div class="sticky top-0 z-30 flex h-14 items-center justify-between border-b border-zinc-200 bg-zinc-50 px-4 lg:hidden dark:border-zinc-700 dark:bg-zinc-900">
            <button @click="sidebarOpen = true" class="rounded-lg p-2 hover:bg-zinc-100 dark:hover:bg-zinc-800">
                <x-heroicon-o-bars-2 class="h-5 w-5 text-zinc-600 dark:text-zinc-400" />
            </button>

            @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-zinc-100 dark:hover:bg-zinc-800">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-200 text-sm font-semibold text-black dark:bg-neutral-700 dark:text-white">
                        {{ auth()->user()->initials() }}
                    </span>
                    <x-heroicon-o-chevron-down class="h-4 w-4 text-zinc-500" />
                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 top-full z-50 mt-1 w-56 overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-lg dark:border-zinc-700 dark:bg-zinc-900"
                >
                    <div class="border-b border-zinc-200 px-3 py-2 dark:border-zinc-700">
                        <p class="truncate text-sm font-semibold text-zinc-900 dark:text-white">{{ auth()->user()->name }}</p>
                        <p class="truncate text-xs text-zinc-500">{{ auth()->user()->email }}</p>
                    </div>
                    <a href="/settings/profile" wire:navigate class="flex items-center gap-2 px-3 py-2 text-sm text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-800">
                        <x-heroicon-o-cog-6-tooth class="h-4 w-4" />
                        Settings
                    </a>
                    <div class="border-t border-zinc-200 dark:border-zinc-700"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-2 px-3 py-2 text-sm text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-800">
                            <x-heroicon-o-arrow-right-start-on-rectangle class="h-4 w-4" />
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </div>

        <!-- Main content area (offset by sidebar on desktop) -->
        <div class="lg:pl-64">
            {{ $slot }}
        </div>

    </body>
</html>

            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                <x-app-logo class="size-8" href="#"></x-app-logo>
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group heading="Platform" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>Dashboard</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                    Repository
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                    Documentation
                </flux:navlist.item>
            </flux:navlist>

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
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
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
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
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

        
    </body>
</html>
