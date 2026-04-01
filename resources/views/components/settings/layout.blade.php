<div class="flex items-start max-md:flex-col">
    <div class="mr-10 w-full pb-4 md:w-[220px]">
        <nav class="flex flex-col gap-y-0.5">
            <a href="{{ route('settings.profile') }}" wire:navigate @class(['flex items-center rounded-lg px-2 py-2 text-sm font-medium transition-colors', 'bg-zinc-100 text-zinc-900 dark:bg-zinc-800 dark:text-white' => request()->routeIs('settings.profile'), 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white' => ! request()->routeIs('settings.profile')])>Profile</a>
            <a href="{{ route('settings.password') }}" wire:navigate @class(['flex items-center rounded-lg px-2 py-2 text-sm font-medium transition-colors', 'bg-zinc-100 text-zinc-900 dark:bg-zinc-800 dark:text-white' => request()->routeIs('settings.password'), 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white' => ! request()->routeIs('settings.password')])>Password</a>
            <a href="{{ route('settings.appearance') }}" wire:navigate @class(['flex items-center rounded-lg px-2 py-2 text-sm font-medium transition-colors', 'bg-zinc-100 text-zinc-900 dark:bg-zinc-800 dark:text-white' => request()->routeIs('settings.appearance'), 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white' => ! request()->routeIs('settings.appearance')])>Appearance</a>
        </nav>
    </div>

    <hr class="border-zinc-200 dark:border-zinc-700 md:hidden w-full mb-4" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <h1 class="text-base font-semibold text-zinc-900 dark:text-white">{{ $heading ?? '' }}</h1>
        <p class="mt-0.5 text-sm text-zinc-500 dark:text-zinc-400">{{ $subheading ?? '' }}</p>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
