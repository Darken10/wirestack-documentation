<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DS UI — Design System Showcase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--  --}}
    @wsStyles
    @livewireStyles
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

{{-- Toast manager --}}
<livewire:ws::toast />

{{-- Command Palette --}}
<livewire:ws::command-palette :commands="[
    ['id' => 'home',     'label' => 'Go to Dashboard',   'icon' => 'home',          'description' => 'Navigate to the main dashboard',   'shortcut' => '⌘D'],
    ['id' => 'settings', 'label' => 'Open Settings',     'icon' => 'cog-6-tooth',   'description' => 'Manage your preferences',           'shortcut' => '⌘,'],
    ['id' => 'new',      'label' => 'New Component',     'icon' => 'plus-circle',   'description' => 'Create a new component',            'badge' => 'New'],
    ['id' => 'docs',     'label' => 'View Documentation','icon' => 'book-open',     'description' => 'Read the design system docs'],
    ['id' => 'theme',    'label' => 'Toggle Dark Mode',  'icon' => 'moon',          'description' => 'Switch between light and dark'],
    ['id' => 'search',   'label' => 'Search Components', 'icon' => 'magnifying-glass','description' => 'Find a component by name'],
]" />

{{-- ─── HEADER / NAV ───────────────────────────────────────── --}}
<header class="sticky top-0 z-30 bg-white/80 dark:bg-zinc-900/80 backdrop-blur border-b border-zinc-200 dark:border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-blue-600 to-violet-600 flex items-center justify-center shrink-0">
                <span class="text-white font-bold text-sm">DS</span>
            </div>
            <div>
                <span class="font-semibold text-zinc-900 dark:text-zinc-100">DS UI</span>
                <span class="ml-1.5 text-xs text-zinc-400">v1.0</span>
            </div>
        </div>

        <div class="hidden md:flex items-center gap-1">
            <x-ws::nav-item href="#atoms" icon="bolt">Atoms</x-ws::nav-item>
            <x-ws::nav-item href="#forms" icon="document-text">Forms</x-ws::nav-item>
            <x-ws::nav-item href="#layout" icon="squares-2x2">Layout</x-ws::nav-item>
            <x-ws::nav-item href="#navigation" icon="map">Navigation</x-ws::nav-item>
            <x-ws::nav-item href="#feedback" icon="bell">Feedback</x-ws::nav-item>
            <x-ws::nav-item href="#data" icon="table-cells">Data</x-ws::nav-item>
            <x-ws::nav-item href="#overlay" icon="square-2-stack">Overlay</x-ws::nav-item>
        </div>

        <div class="flex items-center gap-2">
            <button onclick="window.DsCommandPalette.open()"
                class="hidden sm:flex items-center gap-2 px-3 py-1.5 text-sm text-zinc-500 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-700 rounded-lg hover:border-zinc-300 dark:hover:border-zinc-600 bg-white dark:bg-zinc-800 transition-colors">
                <x-heroicon-o-magnifying-glass class="h-4 w-4" />
                <span>Search…</span>
                <x-ws::kbd size="sm">⌘K</x-ws::kbd>
            </button>

            <button id="themeToggle"
                onclick="document.documentElement.classList.toggle('dark')"
                class="p-2 rounded-lg text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                <x-heroicon-o-moon class="h-5 w-5 dark:hidden" />
                <x-heroicon-o-sun class="h-5 w-5 hidden dark:block" />
            </button>
        </div>
    </div>
</header>

{{-- ─── HERO ────────────────────────────────────────────────── --}}
<div class="bg-gradient-to-br from-blue-600 via-violet-600 to-purple-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <x-ws::badge variant="soft" color="info" class="mb-6 bg-white/20 text-white border-white/30">
            Laravel Livewire 4 · Tailwind v4 · Alpine.js
        </x-ws::badge>
        <h1 class="text-4xl sm:text-5xl font-bold tracking-tight mb-4">
            Complete Design System
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto mb-8">
            50+ fully customizable components for building production-grade Laravel applications. Dark mode, tokens, theming — everything included.
        </p>
        <div class="flex items-center justify-center gap-3 flex-wrap">
            <x-ws::button variant="solid" color="neutral"
                class="bg-white text-zinc-100 hover:bg-zinc-100 border-0 ">
                <x-heroicon-o-code-bracket class="h-4 w-4" />
                View on GitHub
            </x-ws::button>
            <x-ws::button variant="outline" color="neutral"
                class="border-white/40 text-white hover:bg-white/10">
                <x-heroicon-o-book-open class="h-4 w-4 " />
                Documentation
            </x-ws::button>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-24">

    {{-- ─── STATS ──────────────────────────────────────────── --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        @foreach([
            ['label' => 'Components', 'value' => '50+',    'icon' => 'squares-2x2',    'iconColor' => 'primary'],
            ['label' => 'Dark Mode',  'value' => '100%',   'icon' => 'moon',           'iconColor' => 'secondary'],
            ['label' => 'Customizable','value' => '∞',     'icon' => 'adjustments-horizontal','iconColor' => 'success'],
            ['label' => 'Tests Ready','value' => 'Yes',    'icon' => 'check-badge',    'iconColor' => 'info'],
        ] as $stat)
            <x-ws::stat
                label="{{ $stat['label'] }}"
                value="{{ $stat['value'] }}"
                icon="{{ $stat['icon'] }}"
                icon-color="{{ $stat['iconColor'] }}" />
        @endforeach
    </div>

    {{-- ─── SECTION: ATOMS ─────────────────────────────────── --}}
    <section id="atoms">
        <x-ws::section title="Atoms" description="The smallest building blocks of the design system.">

            {{-- Buttons --}}
            <x-ws::card>
                <x-ws::card-header title="Button" description="Variants, sizes, colors, states, and icon support." />
                <x-ws::card-body>
                    <x-ws::stack gap="6">

                        {{-- Variants --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Variants</p>
                            <x-ws::inline gap="3" align="center" wrap>
                                <x-ws::button variant="solid">Solid</x-ws::button>
                                <x-ws::button variant="outline">Outline</x-ws::button>
                                <x-ws::button variant="ghost">Ghost</x-ws::button>
                                <x-ws::button variant="soft">Soft</x-ws::button>
                                <x-ws::button variant="link">Link</x-ws::button>
                            </x-ws::inline>
                        </div>

                        <x-ws::divider />

                        {{-- Colors --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Colors</p>
                            <x-ws::inline gap="2" wrap>
                                @foreach(['primary','secondary','neutral','success','warning','danger','info'] as $c)
                                    <x-ws::button color="{{ $c }}" variant="solid">{{ ucfirst($c) }}</x-ws::button>
                                @endforeach
                            </x-ws::inline>
                        </div>

                        <x-ws::divider />

                        {{-- Sizes --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Sizes</p>
                            <x-ws::inline gap="2" align="center" wrap>
                                @foreach(['xs','sm','md','lg','xl'] as $s)
                                    <x-ws::button size="{{ $s }}">{{ strtoupper($s) }}</x-ws::button>
                                @endforeach
                            </x-ws::inline>
                        </div>

                        <x-ws::divider />

                        {{-- States & Icons --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">States & Icons</p>
                            <x-ws::inline gap="2" align="center" wrap>
                                <x-ws::button icon="plus">With Icon</x-ws::button>
                                <x-ws::button icon-trailing="arrow-right">Trailing</x-ws::button>
                                <x-ws::button :loading="true">Loading</x-ws::button>
                                <x-ws::button :disabled="true">Disabled</x-ws::button>
                                <x-ws::button square icon="heart" />
                                <x-ws::button :full="true" class="max-w-xs">Full Width</x-ws::button>
                            </x-ws::inline>
                        </div>

                    </x-ws::stack>
                </x-ws::card-body>
            </x-ws::card>

            {{-- Badges --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Badge" description="Status indicators and labels." />
                <x-ws::card-body>
                    <x-ws::stack gap="4">
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Soft (default)</p>
                            <x-ws::inline gap="2" wrap>
                                @foreach(['primary','secondary','neutral','success','warning','danger','info'] as $c)
                                    <x-ws::badge color="{{ $c }}">{{ ucfirst($c) }}</x-ws::badge>
                                @endforeach
                            </x-ws::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Solid</p>
                            <x-ws::inline gap="2" wrap>
                                @foreach(['primary','secondary','success','warning','danger','info'] as $c)
                                    <x-ws::badge color="{{ $c }}" variant="solid">{{ ucfirst($c) }}</x-ws::badge>
                                @endforeach
                            </x-ws::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">With dot / dismiss</p>
                            <x-ws::inline gap="2" wrap>
                                <x-ws::badge color="success" :dot="true">Online</x-ws::badge>
                                <x-ws::badge color="danger" :dot="true">Offline</x-ws::badge>
                                <x-ws::badge color="primary" :dismiss="true">Dismissible</x-ws::badge>
                            </x-ws::inline>
                        </div>
                    </x-ws::stack>
                </x-ws::card-body>
            </x-ws::card>

            {{-- Avatar --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Avatar" description="User representation with status indicators." />
                <x-ws::card-body>
                    <x-ws::stack gap="4">
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Sizes</p>
                            <x-ws::inline gap="3" align="center">
                                @foreach(['xs','sm','md','lg','xl','2xl'] as $s)
                                    <x-ws::avatar initials="JD" size="{{ $s }}" color="primary" />
                                @endforeach
                            </x-ws::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Status & Colors</p>
                            <x-ws::inline gap="3" align="center">
                                <x-ws::avatar initials="ON" color="primary" status="online" />
                                <x-ws::avatar initials="AW" color="warning" status="away" />
                                <x-ws::avatar initials="BY" color="danger"  status="busy" />
                                <x-ws::avatar initials="OF" color="neutral" status="offline" />
                                <x-ws::avatar src="https://i.pravatar.cc/80?img=1" size="lg" status="online" />
                                <x-ws::avatar src="https://i.pravatar.cc/80?img=2" size="lg" shape="rounded" />
                                <x-ws::avatar src="https://i.pravatar.cc/80?img=3" size="lg" shape="square" />
                            </x-ws::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Avatar Group</p>
                            <x-ws::avatar-group>
                                @foreach([1,2,3,4,5] as $i)
                                    <x-ws::avatar src="https://i.pravatar.cc/80?img={{ $i }}" size="md" class="ring-2 ring-white dark:ring-zinc-900" />
                                @endforeach
                            </x-ws::avatar-group>
                        </div>
                    </x-ws::stack>
                </x-ws::card-body>
            </x-ws::card>

            {{-- Misc atoms --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Spinner · Divider · Kbd · Chip" />
                <x-ws::card-body>
                    <x-ws::stack gap="6">
                        {{-- Spinner --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Spinner</p>
                            <x-ws::inline gap="4" align="center">
                                @foreach(['primary','success','warning','danger','neutral'] as $c)
                                    <x-ws::spinner color="{{ $c }}" size="lg" />
                                @endforeach
                            </x-ws::inline>
                        </div>
                        <x-ws::divider />
                        {{-- Divider --}}
                        <div class="space-y-3">
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Divider</p>
                            <x-ws::divider />
                            <x-ws::divider>Section</x-ws::divider>
                            <x-ws::divider variant="dashed" />
                        </div>
                        <x-ws::divider />
                        {{-- Kbd --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Keyboard</p>
                            <x-ws::inline gap="2" align="center">
                                <x-ws::kbd>⌘</x-ws::kbd>
                                <x-ws::kbd>K</x-ws::kbd>
                                <span class="text-sm text-zinc-500">or</span>
                                <x-ws::kbd>Ctrl</x-ws::kbd>
                                <x-ws::kbd>Shift</x-ws::kbd>
                                <x-ws::kbd>P</x-ws::kbd>
                            </x-ws::inline>
                        </div>
                        <x-ws::divider />
                        {{-- Chips --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Chips / Tags</p>
                            <x-ws::inline gap="2" wrap>
                                <x-ws::chip color="neutral">Design</x-ws::chip>
                                <x-ws::chip color="primary" :active="true">Active</x-ws::chip>
                                <x-ws::chip color="success" icon="check">Verified</x-ws::chip>
                                <x-ws::chip color="warning" :dismissible="true">Dismissible</x-ws::chip>
                                <x-ws::chip color="danger">Critical</x-ws::chip>
                            </x-ws::inline>
                        </div>
                    </x-ws::stack>
                </x-ws::card-body>
            </x-ws::card>

        </x-ws::section>
    </section>

    {{-- ─── SECTION: FORMS ─────────────────────────────────── --}}
    <section id="forms">
        <x-ws::section title="Forms" description="Every form control you need, fully parameterizable.">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Input --}}
                <x-ws::card>
                    <x-ws::card-header title="Input" description="Text inputs with icons, prefix, suffix, states." />
                    <x-ws::card-body>
                        <x-ws::stack gap="4">
                            <x-ws::input label="Email address" type="email" placeholder="hello@example.com" icon="envelope" />
                            <x-ws::input label="Search" type="search" placeholder="Search..." icon="magnifying-glass" :clearable="true" />
                            <x-ws::input label="Password" type="password" placeholder="••••••••" icon="lock-closed" icon-trailing="eye" />
                            <x-ws::input label="URL" type="url" prefix="https://" placeholder="example.com" />
                            <x-ws::input label="Amount" suffix="USD" placeholder="0.00" />
                            <x-ws::input label="With error" error="This field is required." value="invalid@" />
                            <x-ws::input label="Loading state" :loading="true" placeholder="Validating..." />
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Textarea & Select --}}
                <x-ws::card>
                    <x-ws::card-header title="Textarea & Select" />
                    <x-ws::card-body>
                        <x-ws::stack gap="4">
                            <x-ws::textarea
                                label="Description"
                                placeholder="Write something..."
                                hint="Max 500 characters."
                                :rows="4" />
                            <x-ws::textarea
                                label="Auto-resize"
                                :autoresize="true"
                                placeholder="Type to expand..." />
                            <x-ws::select
                                label="Country"
                                placeholder="Pick a country..."
                                :options="['us' => '🇺🇸 United States', 'fr' => '🇫🇷 France', 'de' => '🇩🇪 Germany', 'jp' => '🇯🇵 Japan']" />
                            <x-ws::select
                                label="With error"
                                error="Please select a valid option." />
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Checkbox & Radio --}}
                <x-ws::card>
                    <x-ws::card-header title="Checkbox & Radio" />
                    <x-ws::card-body>
                        <x-ws::stack gap="5">
                            <div class="space-y-2">
                                <x-ws::checkbox label="I agree to the terms of service" name="terms" />
                                <x-ws::checkbox label="Subscribe to newsletter" name="newsletter" hint="We'll never spam you." />
                                <x-ws::checkbox label="Disabled option" name="disabled" :disabled="true" />
                            </div>
                            <x-ws::divider />
                            <x-ws::radio-group label="Notification preference" error="Please choose one.">
                                <x-ws::radio name="notify" value="all" label="All notifications" hint="Get notified for everything." />
                                <x-ws::radio name="notify" value="important" label="Important only" />
                                <x-ws::radio name="notify" value="none" label="Mute all" :disabled="true" />
                            </x-ws::radio-group>
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Toggle & Range --}}
                <x-ws::card>
                    <x-ws::card-header title="Toggle & Range" />
                    <x-ws::card-body>
                        <x-ws::stack gap="5">
                            <x-ws::toggle label="Enable notifications" hint="Receive push notifications." name="notif" color="primary" />
                            <x-ws::toggle label="Dark mode" name="darkmode" color="secondary" />
                            <x-ws::toggle label="Auto-save" name="autosave" color="success" :checked="true" />
                            <x-ws::toggle label="Disabled toggle" name="tog_dis" :disabled="true" />
                            <x-ws::divider />
                            <x-ws::range label="Volume" :show-value="true" :min="0" :max="100" :step="5" color="primary" />
                            <x-ws::range label="Brightness" :min="10" :max="100" color="success" />
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

            </div>

            {{-- Full form example --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Complete Form Example" description="Form sections, groups, and validation patterns." />
                <x-ws::card-body>
                    <form class="space-y-8">
                        <x-ws::form-section title="Personal Information" description="Your basic profile information.">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <x-ws::input label="First name" placeholder="John" required />
                                <x-ws::input label="Last name" placeholder="Doe" required />
                                <x-ws::input label="Email" type="email" placeholder="john@example.com" icon="envelope" required class="sm:col-span-2" />
                                <x-ws::input label="Phone" type="tel" placeholder="+1 (555) 000-0000" prefix="+1" />
                            </div>
                        </x-ws::form-section>

                        <x-ws::divider />

                        <x-ws::form-section title="Preferences" description="Customize your experience.">
                            <x-ws::form-group label="Language" for="lang-select" inline>
                                <x-ws::select id="lang-select" :options="['en' => 'English', 'fr' => 'Français', 'es' => 'Español']" />
                            </x-ws::form-group>
                            <x-ws::form-group label="Notifications" inline class="mt-4">
                                <div class="space-y-2">
                                    <x-ws::toggle name="email_notif" label="Email notifications" color="primary" />
                                    <x-ws::toggle name="push_notif"  label="Push notifications" color="primary" />
                                </div>
                            </x-ws::form-group>
                        </x-ws::form-section>
                    </form>
                </x-ws::card-body>
                <x-ws::card-footer>
                    <x-ws::button variant="outline" color="neutral">Cancel</x-ws::button>
                    <x-ws::button color="primary">Save Changes</x-ws::button>
                </x-ws::card-footer>
            </x-ws::card>

        </x-ws::section>
    </section>

    {{-- ─── SECTION: LAYOUT ────────────────────────────────── --}}
    <section id="layout">
        <x-ws::section title="Layout" description="Cards, containers, panels, and composition helpers.">

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <x-ws::card variant="bordered">
                    <x-ws::card-header title="Bordered Card" />
                    <x-ws::card-body>A standard bordered card with header and body.</x-ws::card-body>
                </x-ws::card>
                <x-ws::card variant="elevated">
                    <x-ws::card-header title="Elevated Card" />
                    <x-ws::card-body>This card uses a shadow instead of a border.</x-ws::card-body>
                </x-ws::card>
                <x-ws::card :hover="true">
                    <x-ws::card-header title="Hover Card" />
                    <x-ws::card-body>Lifts on hover — great for clickable cards.</x-ws::card-body>
                </x-ws::card>
            </div>

            {{-- Panels --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <x-ws::panel title="Primary Panel" color="primary">A tinted panel for emphasis.</x-ws::panel>
                <x-ws::panel title="Warning Panel" color="warning">Use for caution messages.</x-ws::panel>
                <x-ws::panel title="Danger Panel" color="danger">Use for destructive actions.</x-ws::panel>
            </div>

            {{-- Code --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Code" description="Inline and block code display with copy." />
                <x-ws::card-body>
                    <x-ws::stack gap="4">
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">
                            Install with <x-ws::code :inline="true">composer require wirestack/ui</x-ws::code> then add
                            <x-ws::code :inline="true">@wsStyles</x-ws::code> to your layout.
                        </p>
                        <x-ws::code language="blade" :copy="true">
&lt;x-ws::button color="primary" variant="solid"&gt;
    Click me
&lt;/x-ws::button&gt;</x-ws::code>
                    </x-ws::stack>
                </x-ws::card-body>
            </x-ws::card>

        </x-ws::section>
    </section>

    {{-- ─── SECTION: NAVIGATION ────────────────────────────── --}}
    <section id="navigation">
        <x-ws::section title="Navigation" description="Breadcrumbs, tabs, pagination, and steps.">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Breadcrumb --}}
                <x-ws::card>
                    <x-ws::card-header title="Breadcrumb" />
                    <x-ws::card-body>
                        <x-ws::stack gap="3">
                            <x-ws::breadcrumb :items="[['label'=>'Home','url'=>'/'], ['label'=>'Components','url'=>'#'], 'Button']" />
                            <x-ws::breadcrumb :items="[['label'=>'Dashboard','url'=>'/dashboard'], ['label'=>'Settings','url'=>'#'], 'Profile']" separator="›" />
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Pagination --}}
                <x-ws::card>
                    <x-ws::card-header title="Pagination" />
                    <x-ws::card-body>
                        <x-ws::pagination :current-page="5" :total-pages="12" :total="236" :per-page="20" />
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Tabs --}}
                <x-ws::card class="lg:col-span-2">
                    <x-ws::card-header title="Tabs" description="Underline, pills, and boxed variants." />
                    <x-ws::card-body>
                        <x-ws::stack gap="8">
                            <x-ws::tabs :tabs="['overview'=>'Overview','analytics'=>'Analytics','settings'=>'Settings','billing'=>'Billing']" variant="underline">
                                <x-ws::tab id="overview">
                                    <x-ws::alert color="info" title="Overview Tab">This is the overview content panel.</x-ws::alert>
                                </x-ws::tab>
                                <x-ws::tab id="analytics">
                                    <x-ws::alert color="success" title="Analytics Tab">Analytics data will appear here.</x-ws::alert>
                                </x-ws::tab>
                                <x-ws::tab id="settings">
                                    <x-ws::alert color="warning" title="Settings Tab">Configure your settings here.</x-ws::alert>
                                </x-ws::tab>
                                <x-ws::tab id="billing">
                                    <x-ws::alert color="danger" title="Billing Tab">Manage your billing information.</x-ws::alert>
                                </x-ws::tab>
                            </x-ws::tabs>

                            <x-ws::tabs :tabs="['tab1'=>'Design','tab2'=>'Prototype','tab3'=>'Review']" variant="pills">
                                <x-ws::tab id="tab1"><p class="text-sm text-zinc-600 dark:text-zinc-400">Design content.</p></x-ws::tab>
                                <x-ws::tab id="tab2"><p class="text-sm text-zinc-600 dark:text-zinc-400">Prototype content.</p></x-ws::tab>
                                <x-ws::tab id="tab3"><p class="text-sm text-zinc-600 dark:text-zinc-400">Review content.</p></x-ws::tab>
                            </x-ws::tabs>
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Steps --}}
                <x-ws::card class="lg:col-span-2">
                    <x-ws::card-header title="Steps / Stepper" />
                    <x-ws::card-body>
                        <x-ws::steps>
                            <x-ws::step number="1" title="Account" description="Create your account." status="completed" />
                            <x-ws::step number="2" title="Profile" description="Add your details."   status="current" />
                            <x-ws::step number="3" title="Team"    description="Invite teammates."   status="pending" />
                            <x-ws::step number="4" title="Launch"  description="Go live!"            status="pending" />
                        </x-ws::steps>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Accordion --}}
                <x-ws::card class="lg:col-span-2">
                    <x-ws::card-header title="Accordion" />
                    <x-ws::card-body>
                        <x-ws::accordion>
                            <x-ws::accordion-item title="What is DS UI?" icon="information-circle" :open="true">
                                DS UI is a complete, production-ready design system for Laravel Livewire 4. It provides 50+ customizable components built with Tailwind CSS v4 and Alpine.js.
                            </x-ws::accordion-item>
                            <x-ws::accordion-item title="How do I install it?">
                                Run <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">composer require wirestack/ui</code> in your Laravel project, then add <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">@wsStyles</code> to your layout file.
                            </x-ws::accordion-item>
                            <x-ws::accordion-item title="Is dark mode supported?">
                                Yes! Every component has full dark mode support out of the box.
                            </x-ws::accordion-item>
                            <x-ws::accordion-item title="Can I customize the tokens?" icon="adjustments-horizontal">
                                Absolutely. Publish the config with <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">php artisan vendor:publish --tag=ds-config</code> and edit <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">config/ds.php</code>.
                            </x-ws::accordion-item>
                        </x-ws::accordion>
                    </x-ws::card-body>
                </x-ws::card>

            </div>

        </x-ws::section>
    </section>

    {{-- ─── SECTION: FEEDBACK ──────────────────────────────── --}}
    <section id="feedback">
        <x-ws::section title="Feedback" description="Alerts, progress, skeletons, and empty states.">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Alerts --}}
                <x-ws::card>
                    <x-ws::card-header title="Alert" description="Soft and solid variants for every color." />
                    <x-ws::card-body>
                        <x-ws::stack gap="3">
                            <x-ws::alert color="info"    title="Heads up!">This is an informational message.</x-ws::alert>
                            <x-ws::alert color="success" title="All done!">Your changes have been saved.</x-ws::alert>
                            <x-ws::alert color="warning" title="Caution">Review before proceeding.</x-ws::alert>
                            <x-ws::alert color="danger"  title="Error" :dismissible="true">Something went wrong. Click to dismiss.</x-ws::alert>
                            <x-ws::alert color="neutral">A neutral note without a title.</x-ws::alert>
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Toast trigger --}}
                <x-ws::card>
                    <x-ws::card-header title="Toast Notifications" description="Click to trigger toast messages." />
                    <x-ws::card-body>
                        <x-ws::stack gap="3">
                            @foreach([
                                ['type'=>'success','label'=>'Success Toast','color'=>'success'],
                                ['type'=>'error',  'label'=>'Error Toast',  'color'=>'danger'],
                                ['type'=>'warning','label'=>'Warning Toast','color'=>'warning'],
                                ['type'=>'info',   'label'=>'Info Toast',   'color'=>'info'],
                            ] as $t)
                                <x-ws::button
                                    color="{{ $t['color'] }}"
                                    variant="soft"
                                    :full="true"
                                    onclick="DsToast.{{ $t['type'] }}('{{ $t['label'] }}', {title: '{{ ucfirst($t['type']) }}!'})">
                                    Show {{ $t['label'] }}
                                </x-ws::button>
                            @endforeach
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Progress --}}
                <x-ws::card>
                    <x-ws::card-header title="Progress" description="Determinate progress bars." />
                    <x-ws::card-body>
                        <x-ws::stack gap="4">
                            <x-ws::progress label="Upload Progress" :value="72" :show-value="true" color="primary" />
                            <x-ws::progress label="Storage Used" :value="45" color="success" size="md" />
                            <x-ws::progress label="Striped + Animated" :value="60" :striped="true" :animated="true" color="info" size="lg" />
                            <x-ws::progress-bar :segments="[
                                ['label' => 'Used',  'value' => 45, 'color' => 'bg-blue-600'],
                                ['label' => 'Other', 'value' => 20, 'color' => 'bg-violet-500'],
                                ['label' => 'Free',  'value' => 35, 'color' => 'bg-zinc-200 dark:bg-zinc-700'],
                            ]" />
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Skeleton --}}
                <x-ws::card>
                    <x-ws::card-header title="Skeleton" description="Loading placeholders." />
                    <x-ws::card-body>
                        <x-ws::stack gap="5">
                            <x-ws::skeleton variant="avatar" />
                            <x-ws::skeleton variant="list" :lines="3" />
                        </x-ws::stack>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Empty state --}}
                <x-ws::card class="lg:col-span-2">
                    <x-ws::card-header title="Empty State" />
                    <x-ws::card-body>
                        <x-ws::empty-state
                            icon="inbox"
                            title="No messages yet"
                            description="When you receive messages they'll show up here. Start a new conversation to get going.">
                            <x-ws::button color="primary" icon="plus">
                                New Message
                            </x-ws::button>
                        </x-ws::empty-state>
                    </x-ws::card-body>
                </x-ws::card>

            </div>

        </x-ws::section>
    </section>

    {{-- ─── SECTION: DATA DISPLAY ──────────────────────────── --}}
    <section id="data">
        <x-ws::section title="Data Display" description="Stats, tables, and timeline.">

            {{-- Stats --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-ws::stat label="Total Revenue"  value="$48,295" trend="up"   trend-value="+12.5%" description="vs last month" icon="currency-dollar" icon-color="success" />
                <x-ws::stat label="Active Users"   value="3,842"   trend="up"   trend-value="+4.1%"  description="vs last month" icon="users"          icon-color="primary" />
                <x-ws::stat label="Bounce Rate"    value="23.5%"   trend="down" trend-value="-2.8%"  description="vs last month" icon="arrow-trending-down" icon-color="warning" />
                <x-ws::stat label="Avg. Session"   value="4m 32s"  trend="up"   trend-value="+0.5m"  description="vs last month" icon="clock"          icon-color="info" />
            </div>

            {{-- Table --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Table" description="Sortable, filterable data table.">
                    <x-slot name="actions">
                        <x-ws::button variant="outline" size="sm" icon="arrow-down-tray">Export</x-ws::button>
                        <x-ws::button size="sm" icon="plus">Add Row</x-ws::button>
                    </x-slot>
                </x-ws::card-header>
                <x-ws::table
                    :columns="[
                        ['key'=>'name',   'label'=>'Name'],
                        ['key'=>'email',  'label'=>'Email'],
                        ['key'=>'role',   'label'=>'Role'],
                        ['key'=>'status', 'label'=>'Status'],
                        ['key'=>'joined', 'label'=>'Joined', 'nowrap'=>true],
                    ]"
                    :rows="[
                        ['name'=>'Alice Martin',   'email'=>'alice@example.com',   'role'=>'Admin',    'status'=>'Active',   'joined'=>'Jan 2024'],
                        ['name'=>'Bob Chen',       'email'=>'bob@example.com',     'role'=>'Editor',   'status'=>'Active',   'joined'=>'Mar 2024'],
                        ['name'=>'Carol White',    'email'=>'carol@example.com',   'role'=>'Viewer',   'status'=>'Inactive', 'joined'=>'May 2024'],
                        ['name'=>'David Lee',      'email'=>'david@example.com',   'role'=>'Editor',   'status'=>'Active',   'joined'=>'Jun 2024'],
                        ['name'=>'Emma Johnson',   'email'=>'emma@example.com',    'role'=>'Admin',    'status'=>'Active',   'joined'=>'Aug 2024'],
                    ]"
                    :hoverable="true" />
            </x-ws::card>

            {{-- Timeline --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Timeline" description="Activity and event history." />
                <x-ws::card-body>
                    <x-ws::timeline>
                        <x-ws::timeline-item
                            title="Design system published"
                            description="Version 1.0.0 is now live and available for all teams."
                            date="2 hours ago"
                            icon="rocket-launch"
                            color="primary" />
                        <x-ws::timeline-item
                            title="Tests all passed"
                            description="All 248 tests pass with 100% component coverage."
                            date="4 hours ago"
                            icon="check-circle"
                            color="success" />
                        <x-ws::timeline-item
                            title="Dark mode added"
                            description="Full dark mode support for all 50+ components."
                            date="Yesterday"
                            icon="moon"
                            color="secondary" />
                        <x-ws::timeline-item
                            title="Initial commit"
                            description="Project started with package scaffolding."
                            date="3 days ago"
                            icon="code-bracket"
                            color="neutral"
                            :last="true" />
                    </x-ws::timeline>
                </x-ws::card-body>
            </x-ws::card>

            {{-- Live DataTable --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Interactive DataTable" description="Search, sort, and paginate — powered by Livewire." />
                <x-ws::card-body>
                    <livewire:ws::data-table
                        :columns="[
                            ['key'=>'id',      'label'=>'#',      'sortable'=>true],
                            ['key'=>'name',    'label'=>'Name',   'sortable'=>true],
                            ['key'=>'email',   'label'=>'Email',  'sortable'=>true],
                            ['key'=>'country', 'label'=>'Country','sortable'=>true],
                            ['key'=>'plan',    'label'=>'Plan',   'sortable'=>true],
                        ]"
                        :rows="collect(range(1, 50))->map(fn($i) => [
                            'id'      => $i,
                            'name'    => fake()->name(),
                            'email'   => fake()->email(),
                            'country' => fake()->country(),
                            'plan'    => ['Free','Pro','Enterprise'][($i-1) % 3],
                        ])->toArray()"
                        :searchable="true"
                        :selectable="true"
                        :per-page-options="[10, 25, 50]"
                        :per-page="10" />
                </x-ws::card-body>
            </x-ws::card>

        </x-ws::section>
    </section>

    {{-- ─── SECTION: OVERLAY ───────────────────────────────── --}}
    <section id="overlay">
        <x-ws::section title="Overlay & Interactive" description="Modals, drawers, dropdowns, tooltips, and more.">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- Modal --}}
                <x-ws::card :hover="true">
                    <x-ws::card-body>
                        <div class="text-center py-2">
                            <x-heroicon-o-squares-2x2 class="h-8 w-8 text-blue-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Modal Dialog</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Full-featured modal with Livewire.</p>
                            <livewire:ws::modal modal-id="demo-modal" title="Demo Modal" description="This modal is powered by Livewire." size="md">
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                    This is the modal body. You can put any content here — forms, tables, images, etc.
                                </p>
                                <x-slot name="footer">
                                    <x-ws::button variant="outline" color="neutral" onclick="DsModal.close('demo-modal')">Cancel</x-ws::button>
                                    <x-ws::button color="primary">Confirm</x-ws::button>
                                </x-slot>
                            </livewire:ws::modal>
                            <x-ws::button variant="outline" size="sm" onclick="DsModal.open('demo-modal')">
                                Open Modal
                            </x-ws::button>
                        </div>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Drawer --}}
                <x-ws::card :hover="true">
                    <x-ws::card-body>
                        <div class="text-center py-2">
                            <x-heroicon-o-chevron-double-right class="h-8 w-8 text-violet-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Drawer / Slide-over</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Slide-in panel from any side.</p>
                            <livewire:ws::drawer drawer-id="demo-drawer" title="Edit Profile" position="right" size="md">
                                <x-ws::stack gap="4">
                                    <x-ws::input label="Name" value="John Doe" />
                                    <x-ws::input label="Email" type="email" value="john@example.com" />
                                    <x-ws::textarea label="Bio" placeholder="Tell us about yourself..." />
                                </x-ws::stack>
                                <x-slot name="footer">
                                    <x-ws::button variant="outline" color="neutral" onclick="DsDrawer.close('demo-drawer')">Cancel</x-ws::button>
                                    <x-ws::button color="primary">Save</x-ws::button>
                                </x-slot>
                            </livewire:ws::drawer>
                            <x-ws::button variant="outline" size="sm" onclick="DsDrawer.open('demo-drawer')">
                                Open Drawer
                            </x-ws::button>
                        </div>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Dropdown --}}
                <x-ws::card :hover="true">
                    <x-ws::card-body>
                        <div class="text-center py-2">
                            <x-heroicon-o-chevron-down class="h-8 w-8 text-emerald-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Dropdown Menu</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Alpine.js powered context menus.</p>
                            <x-ws::dropdown>
                                <x-slot name="trigger">
                                    <x-ws::button size="sm" variant="outline" icon-trailing="chevron-down">
                                        Options
                                    </x-ws::button>
                                </x-slot>
                                <x-ws::dropdown-item icon="pencil" href="#">Edit</x-ws::dropdown-item>
                                <x-ws::dropdown-item icon="document-duplicate" href="#">Duplicate</x-ws::dropdown-item>
                                <x-ws::dropdown-item icon="arrow-up-on-square" href="#">Export</x-ws::dropdown-item>
                                <x-ws::dropdown-item :separator="true" />
                                <x-ws::dropdown-item icon="trash" :danger="true" href="#">Delete</x-ws::dropdown-item>
                            </x-ws::dropdown>
                        </div>
                    </x-ws::card-body>
                </x-ws::card>

                {{-- Tooltip --}}
                <x-ws::card :hover="true">
                    <x-ws::card-body>
                        <div class="text-center py-2">
                            <x-heroicon-o-chat-bubble-left class="h-8 w-8 text-amber-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Tooltip</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Hover-triggered contextual hints.</p>
                            <div class="flex items-center justify-center gap-2 flex-wrap">
                                @foreach(['top','right','bottom','left'] as $pos)
                                    <x-ws::tooltip text="{{ ucfirst($pos) }}" position="{{ $pos }}">
                                        <x-ws::button size="xs" variant="soft">{{ ucfirst($pos) }}</x-ws::button>
                                    </x-ws::tooltip>
                                @endforeach
                            </div>
                        </div>
                    </x-ws::card-body>
                </x-ws::card>

            </div>

            {{-- Collapsible --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Collapsible" />
                <x-ws::card-body>
                    <x-ws::collapsible label="Show advanced settings" icon="adjustments-horizontal">
                        <x-ws::panel color="neutral" class="mt-2">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <x-ws::input label="API Key" type="password" placeholder="sk-..." />
                                <x-ws::select label="Region" :options="['us-east'=>'US East','eu-west'=>'EU West','ap-south'=>'AP South']" />
                            </div>
                        </x-ws::panel>
                    </x-ws::collapsible>
                </x-ws::card-body>
            </x-ws::card>

            {{-- Command Palette trigger --}}
            <x-ws::card class="mt-6">
                <x-ws::card-header title="Command Palette" description="Press ⌘K to open globally." />
                <x-ws::card-body>
                    <div class="flex items-center gap-3 flex-wrap">
                        <x-ws::button
                            variant="outline"
                            color="neutral"
                            icon="magnifying-glass"
                            onclick="window.DsCommandPalette.open()">
                            Open Command Palette
                        </x-ws::button>
                        <x-ws::inline gap="1.5" align="center">
                            <span class="text-sm text-zinc-500">Shortcut:</span>
                            <x-ws::kbd>⌘</x-ws::kbd>
                            <x-ws::kbd>K</x-ws::kbd>
                        </x-ws::inline>
                    </div>
                </x-ws::card-body>
            </x-ws::card>

        </x-ws::section>
    </section>

    {{-- ─── FOOTER ─────────────────────────────────────────── --}}
    <footer class="border-t border-zinc-200 dark:border-zinc-800 pt-12 pb-6">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <div class="h-6 w-6 rounded-md bg-gradient-to-br from-blue-600 to-violet-600 flex items-center justify-center">
                    <span class="text-white font-bold text-xs">DS</span>
                </div>
                <span class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">DS UI</span>
                <x-ws::badge size="xs" color="success">v1.0.0</x-ws::badge>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                Built for Laravel Livewire 4 · Tailwind v4 · MIT License
            </p>
        </div>
    </footer>

</div>


@wsScripts
@livewireScripts
</body>
</html>
