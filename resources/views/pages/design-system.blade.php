<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DS UI — Design System Showcase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
    @dsStyles
    @livewireStyles
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

{{-- Toast manager --}}
<livewire:ds::toast />

{{-- Command Palette --}}
<livewire:ds::command-palette :commands="[
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
            <x-ds::nav-item href="#atoms" icon="bolt">Atoms</x-ds::nav-item>
            <x-ds::nav-item href="#forms" icon="document-text">Forms</x-ds::nav-item>
            <x-ds::nav-item href="#layout" icon="squares-2x2">Layout</x-ds::nav-item>
            <x-ds::nav-item href="#navigation" icon="map">Navigation</x-ds::nav-item>
            <x-ds::nav-item href="#feedback" icon="bell">Feedback</x-ds::nav-item>
            <x-ds::nav-item href="#data" icon="table-cells">Data</x-ds::nav-item>
            <x-ds::nav-item href="#overlay" icon="square-2-stack">Overlay</x-ds::nav-item>
        </div>

        <div class="flex items-center gap-2">
            <button onclick="window.DsCommandPalette.open()"
                class="hidden sm:flex items-center gap-2 px-3 py-1.5 text-sm text-zinc-500 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-700 rounded-lg hover:border-zinc-300 dark:hover:border-zinc-600 bg-white dark:bg-zinc-800 transition-colors">
                <flux:icon.magnifying-glass class="h-4 w-4" />
                <span>Search…</span>
                <x-ds::kbd size="sm">⌘K</x-ds::kbd>
            </button>

            <button id="themeToggle"
                onclick="document.documentElement.classList.toggle('dark')"
                class="p-2 rounded-lg text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                <flux:icon.moon class="h-5 w-5 dark:hidden" />
                <flux:icon.sun class="h-5 w-5 hidden dark:block" />
            </button>
        </div>
    </div>
</header>

{{-- ─── HERO ────────────────────────────────────────────────── --}}
<div class="bg-gradient-to-br from-blue-600 via-violet-600 to-purple-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <x-ds::badge variant="soft" color="info" class="mb-6 bg-white/20 text-white border-white/30">
            Laravel Livewire 4 · Tailwind v4 · Alpine.js
        </x-ds::badge>
        <h1 class="text-4xl sm:text-5xl font-bold tracking-tight mb-4">
            Complete Design System
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto mb-8">
            50+ fully customizable components for building production-grade Laravel applications. Dark mode, tokens, theming — everything included.
        </p>
        <div class="flex items-center justify-center gap-3 flex-wrap">
            <x-ds::button variant="solid" color="neutral"
                class="bg-white text-zinc-900 hover:bg-zinc-100 border-0">
                <flux:icon.code-bracket class="h-4 w-4" />
                View on GitHub
            </x-ds::button>
            <x-ds::button variant="outline" color="neutral"
                class="border-white/40 text-white hover:bg-white/10">
                <flux:icon.book-open class="h-4 w-4" />
                Documentation
            </x-ds::button>
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
            <x-ds::stat
                label="{{ $stat['label'] }}"
                value="{{ $stat['value'] }}"
                icon="{{ $stat['icon'] }}"
                icon-color="{{ $stat['iconColor'] }}" />
        @endforeach
    </div>

    {{-- ─── SECTION: ATOMS ─────────────────────────────────── --}}
    <section id="atoms">
        <x-ds::section title="Atoms" description="The smallest building blocks of the design system.">

            {{-- Buttons --}}
            <x-ds::card>
                <x-ds::card-header title="Button" description="Variants, sizes, colors, states, and icon support." />
                <x-ds::card-body>
                    <x-ds::stack gap="6">

                        {{-- Variants --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Variants</p>
                            <x-ds::inline gap="3" align="center" wrap>
                                <x-ds::button variant="solid">Solid</x-ds::button>
                                <x-ds::button variant="outline">Outline</x-ds::button>
                                <x-ds::button variant="ghost">Ghost</x-ds::button>
                                <x-ds::button variant="soft">Soft</x-ds::button>
                                <x-ds::button variant="link">Link</x-ds::button>
                            </x-ds::inline>
                        </div>

                        <x-ds::divider />

                        {{-- Colors --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Colors</p>
                            <x-ds::inline gap="2" wrap>
                                @foreach(['primary','secondary','neutral','success','warning','danger','info'] as $c)
                                    <x-ds::button color="{{ $c }}" variant="solid">{{ ucfirst($c) }}</x-ds::button>
                                @endforeach
                            </x-ds::inline>
                        </div>

                        <x-ds::divider />

                        {{-- Sizes --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Sizes</p>
                            <x-ds::inline gap="2" align="center" wrap>
                                @foreach(['xs','sm','md','lg','xl'] as $s)
                                    <x-ds::button size="{{ $s }}">{{ strtoupper($s) }}</x-ds::button>
                                @endforeach
                            </x-ds::inline>
                        </div>

                        <x-ds::divider />

                        {{-- States & Icons --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">States & Icons</p>
                            <x-ds::inline gap="2" align="center" wrap>
                                <x-ds::button icon="plus">With Icon</x-ds::button>
                                <x-ds::button icon-trailing="arrow-right">Trailing</x-ds::button>
                                <x-ds::button :loading="true">Loading</x-ds::button>
                                <x-ds::button :disabled="true">Disabled</x-ds::button>
                                <x-ds::button square icon="heart" />
                                <x-ds::button :full="true" class="max-w-xs">Full Width</x-ds::button>
                            </x-ds::inline>
                        </div>

                    </x-ds::stack>
                </x-ds::card-body>
            </x-ds::card>

            {{-- Badges --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Badge" description="Status indicators and labels." />
                <x-ds::card-body>
                    <x-ds::stack gap="4">
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Soft (default)</p>
                            <x-ds::inline gap="2" wrap>
                                @foreach(['primary','secondary','neutral','success','warning','danger','info'] as $c)
                                    <x-ds::badge color="{{ $c }}">{{ ucfirst($c) }}</x-ds::badge>
                                @endforeach
                            </x-ds::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Solid</p>
                            <x-ds::inline gap="2" wrap>
                                @foreach(['primary','secondary','success','warning','danger','info'] as $c)
                                    <x-ds::badge color="{{ $c }}" variant="solid">{{ ucfirst($c) }}</x-ds::badge>
                                @endforeach
                            </x-ds::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">With dot / dismiss</p>
                            <x-ds::inline gap="2" wrap>
                                <x-ds::badge color="success" :dot="true">Online</x-ds::badge>
                                <x-ds::badge color="danger" :dot="true">Offline</x-ds::badge>
                                <x-ds::badge color="primary" :dismiss="true">Dismissible</x-ds::badge>
                            </x-ds::inline>
                        </div>
                    </x-ds::stack>
                </x-ds::card-body>
            </x-ds::card>

            {{-- Avatar --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Avatar" description="User representation with status indicators." />
                <x-ds::card-body>
                    <x-ds::stack gap="4">
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Sizes</p>
                            <x-ds::inline gap="3" align="center">
                                @foreach(['xs','sm','md','lg','xl','2xl'] as $s)
                                    <x-ds::avatar initials="JD" size="{{ $s }}" color="primary" />
                                @endforeach
                            </x-ds::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Status & Colors</p>
                            <x-ds::inline gap="3" align="center">
                                <x-ds::avatar initials="ON" color="primary" status="online" />
                                <x-ds::avatar initials="AW" color="warning" status="away" />
                                <x-ds::avatar initials="BY" color="danger"  status="busy" />
                                <x-ds::avatar initials="OF" color="neutral" status="offline" />
                                <x-ds::avatar src="https://i.pravatar.cc/80?img=1" size="lg" status="online" />
                                <x-ds::avatar src="https://i.pravatar.cc/80?img=2" size="lg" shape="rounded" />
                                <x-ds::avatar src="https://i.pravatar.cc/80?img=3" size="lg" shape="square" />
                            </x-ds::inline>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Avatar Group</p>
                            <x-ds::avatar-group>
                                @foreach([1,2,3,4,5] as $i)
                                    <x-ds::avatar src="https://i.pravatar.cc/80?img={{ $i }}" size="md" class="ring-2 ring-white dark:ring-zinc-900" />
                                @endforeach
                            </x-ds::avatar-group>
                        </div>
                    </x-ds::stack>
                </x-ds::card-body>
            </x-ds::card>

            {{-- Misc atoms --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Spinner · Divider · Kbd · Chip" />
                <x-ds::card-body>
                    <x-ds::stack gap="6">
                        {{-- Spinner --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Spinner</p>
                            <x-ds::inline gap="4" align="center">
                                @foreach(['primary','success','warning','danger','neutral'] as $c)
                                    <x-ds::spinner color="{{ $c }}" size="lg" />
                                @endforeach
                            </x-ds::inline>
                        </div>
                        <x-ds::divider />
                        {{-- Divider --}}
                        <div class="space-y-3">
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Divider</p>
                            <x-ds::divider />
                            <x-ds::divider>Section</x-ds::divider>
                            <x-ds::divider variant="dashed" />
                        </div>
                        <x-ds::divider />
                        {{-- Kbd --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Keyboard</p>
                            <x-ds::inline gap="2" align="center">
                                <x-ds::kbd>⌘</x-ds::kbd>
                                <x-ds::kbd>K</x-ds::kbd>
                                <span class="text-sm text-zinc-500">or</span>
                                <x-ds::kbd>Ctrl</x-ds::kbd>
                                <x-ds::kbd>Shift</x-ds::kbd>
                                <x-ds::kbd>P</x-ds::kbd>
                            </x-ds::inline>
                        </div>
                        <x-ds::divider />
                        {{-- Chips --}}
                        <div>
                            <p class="text-xs font-semibold text-zinc-400 uppercase tracking-wide mb-3">Chips / Tags</p>
                            <x-ds::inline gap="2" wrap>
                                <x-ds::chip color="neutral">Design</x-ds::chip>
                                <x-ds::chip color="primary" :active="true">Active</x-ds::chip>
                                <x-ds::chip color="success" icon="check">Verified</x-ds::chip>
                                <x-ds::chip color="warning" :dismissible="true">Dismissible</x-ds::chip>
                                <x-ds::chip color="danger">Critical</x-ds::chip>
                            </x-ds::inline>
                        </div>
                    </x-ds::stack>
                </x-ds::card-body>
            </x-ds::card>

        </x-ds::section>
    </section>

    {{-- ─── SECTION: FORMS ─────────────────────────────────── --}}
    <section id="forms">
        <x-ds::section title="Forms" description="Every form control you need, fully parameterizable.">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Input --}}
                <x-ds::card>
                    <x-ds::card-header title="Input" description="Text inputs with icons, prefix, suffix, states." />
                    <x-ds::card-body>
                        <x-ds::stack gap="4">
                            <x-ds::input label="Email address" type="email" placeholder="hello@example.com" icon="envelope" />
                            <x-ds::input label="Search" type="search" placeholder="Search..." icon="magnifying-glass" :clearable="true" />
                            <x-ds::input label="Password" type="password" placeholder="••••••••" icon="lock-closed" icon-trailing="eye" />
                            <x-ds::input label="URL" type="url" prefix="https://" placeholder="example.com" />
                            <x-ds::input label="Amount" suffix="USD" placeholder="0.00" />
                            <x-ds::input label="With error" error="This field is required." value="invalid@" />
                            <x-ds::input label="Loading state" :loading="true" placeholder="Validating..." />
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Textarea & Select --}}
                <x-ds::card>
                    <x-ds::card-header title="Textarea & Select" />
                    <x-ds::card-body>
                        <x-ds::stack gap="4">
                            <x-ds::textarea
                                label="Description"
                                placeholder="Write something..."
                                hint="Max 500 characters."
                                :rows="4" />
                            <x-ds::textarea
                                label="Auto-resize"
                                :autoresize="true"
                                placeholder="Type to expand..." />
                            <x-ds::select
                                label="Country"
                                placeholder="Pick a country..."
                                :options="['us' => '🇺🇸 United States', 'fr' => '🇫🇷 France', 'de' => '🇩🇪 Germany', 'jp' => '🇯🇵 Japan']" />
                            <x-ds::select
                                label="With error"
                                error="Please select a valid option." />
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Checkbox & Radio --}}
                <x-ds::card>
                    <x-ds::card-header title="Checkbox & Radio" />
                    <x-ds::card-body>
                        <x-ds::stack gap="5">
                            <div class="space-y-2">
                                <x-ds::checkbox label="I agree to the terms of service" name="terms" />
                                <x-ds::checkbox label="Subscribe to newsletter" name="newsletter" hint="We'll never spam you." />
                                <x-ds::checkbox label="Disabled option" name="disabled" :disabled="true" />
                            </div>
                            <x-ds::divider />
                            <x-ds::radio-group label="Notification preference" error="Please choose one.">
                                <x-ds::radio name="notify" value="all" label="All notifications" hint="Get notified for everything." />
                                <x-ds::radio name="notify" value="important" label="Important only" />
                                <x-ds::radio name="notify" value="none" label="Mute all" :disabled="true" />
                            </x-ds::radio-group>
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Toggle & Range --}}
                <x-ds::card>
                    <x-ds::card-header title="Toggle & Range" />
                    <x-ds::card-body>
                        <x-ds::stack gap="5">
                            <x-ds::toggle label="Enable notifications" hint="Receive push notifications." name="notif" color="primary" />
                            <x-ds::toggle label="Dark mode" name="darkmode" color="secondary" />
                            <x-ds::toggle label="Auto-save" name="autosave" color="success" :checked="true" />
                            <x-ds::toggle label="Disabled toggle" name="tog_dis" :disabled="true" />
                            <x-ds::divider />
                            <x-ds::range label="Volume" :show-value="true" :min="0" :max="100" :step="5" color="primary" />
                            <x-ds::range label="Brightness" :min="10" :max="100" color="success" />
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

            </div>

            {{-- Full form example --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Complete Form Example" description="Form sections, groups, and validation patterns." />
                <x-ds::card-body>
                    <form class="space-y-8">
                        <x-ds::form-section title="Personal Information" description="Your basic profile information.">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <x-ds::input label="First name" placeholder="John" required />
                                <x-ds::input label="Last name" placeholder="Doe" required />
                                <x-ds::input label="Email" type="email" placeholder="john@example.com" icon="envelope" required class="sm:col-span-2" />
                                <x-ds::input label="Phone" type="tel" placeholder="+1 (555) 000-0000" prefix="+1" />
                            </div>
                        </x-ds::form-section>

                        <x-ds::divider />

                        <x-ds::form-section title="Preferences" description="Customize your experience.">
                            <x-ds::form-group label="Language" for="lang-select" inline>
                                <x-ds::select id="lang-select" :options="['en' => 'English', 'fr' => 'Français', 'es' => 'Español']" />
                            </x-ds::form-group>
                            <x-ds::form-group label="Notifications" inline class="mt-4">
                                <div class="space-y-2">
                                    <x-ds::toggle name="email_notif" label="Email notifications" color="primary" />
                                    <x-ds::toggle name="push_notif"  label="Push notifications" color="primary" />
                                </div>
                            </x-ds::form-group>
                        </x-ds::form-section>
                    </form>
                </x-ds::card-body>
                <x-ds::card-footer>
                    <x-ds::button variant="outline" color="neutral">Cancel</x-ds::button>
                    <x-ds::button color="primary">Save Changes</x-ds::button>
                </x-ds::card-footer>
            </x-ds::card>

        </x-ds::section>
    </section>

    {{-- ─── SECTION: LAYOUT ────────────────────────────────── --}}
    <section id="layout">
        <x-ds::section title="Layout" description="Cards, containers, panels, and composition helpers.">

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <x-ds::card variant="bordered">
                    <x-ds::card-header title="Bordered Card" />
                    <x-ds::card-body>A standard bordered card with header and body.</x-ds::card-body>
                </x-ds::card>
                <x-ds::card variant="elevated">
                    <x-ds::card-header title="Elevated Card" />
                    <x-ds::card-body>This card uses a shadow instead of a border.</x-ds::card-body>
                </x-ds::card>
                <x-ds::card :hover="true">
                    <x-ds::card-header title="Hover Card" />
                    <x-ds::card-body>Lifts on hover — great for clickable cards.</x-ds::card-body>
                </x-ds::card>
            </div>

            {{-- Panels --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                <x-ds::panel title="Primary Panel" color="primary">A tinted panel for emphasis.</x-ds::panel>
                <x-ds::panel title="Warning Panel" color="warning">Use for caution messages.</x-ds::panel>
                <x-ds::panel title="Danger Panel" color="danger">Use for destructive actions.</x-ds::panel>
            </div>

            {{-- Code --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Code" description="Inline and block code display with copy." />
                <x-ds::card-body>
                    <x-ds::stack gap="4">
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">
                            Install with <x-ds::code :inline="true">composer require ds/ui</x-ds::code> then add
                            <x-ds::code :inline="true">@dsStyles</x-ds::code> to your layout.
                        </p>
                        <x-ds::code language="blade" :copy="true">
&lt;x-ds::button color="primary" variant="solid"&gt;
    Click me
&lt;/x-ds::button&gt;</x-ds::code>
                    </x-ds::stack>
                </x-ds::card-body>
            </x-ds::card>

        </x-ds::section>
    </section>

    {{-- ─── SECTION: NAVIGATION ────────────────────────────── --}}
    <section id="navigation">
        <x-ds::section title="Navigation" description="Breadcrumbs, tabs, pagination, and steps.">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Breadcrumb --}}
                <x-ds::card>
                    <x-ds::card-header title="Breadcrumb" />
                    <x-ds::card-body>
                        <x-ds::stack gap="3">
                            <x-ds::breadcrumb :items="[['label'=>'Home','url'=>'/'], ['label'=>'Components','url'=>'#'], 'Button']" />
                            <x-ds::breadcrumb :items="[['label'=>'Dashboard','url'=>'/dashboard'], ['label'=>'Settings','url'=>'#'], 'Profile']" separator="›" />
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Pagination --}}
                <x-ds::card>
                    <x-ds::card-header title="Pagination" />
                    <x-ds::card-body>
                        <x-ds::pagination :current-page="5" :total-pages="12" :total="236" :per-page="20" />
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Tabs --}}
                <x-ds::card class="lg:col-span-2">
                    <x-ds::card-header title="Tabs" description="Underline, pills, and boxed variants." />
                    <x-ds::card-body>
                        <x-ds::stack gap="8">
                            <x-ds::tabs :tabs="['overview'=>'Overview','analytics'=>'Analytics','settings'=>'Settings','billing'=>'Billing']" variant="underline">
                                <x-ds::tab id="overview">
                                    <x-ds::alert color="info" title="Overview Tab">This is the overview content panel.</x-ds::alert>
                                </x-ds::tab>
                                <x-ds::tab id="analytics">
                                    <x-ds::alert color="success" title="Analytics Tab">Analytics data will appear here.</x-ds::alert>
                                </x-ds::tab>
                                <x-ds::tab id="settings">
                                    <x-ds::alert color="warning" title="Settings Tab">Configure your settings here.</x-ds::alert>
                                </x-ds::tab>
                                <x-ds::tab id="billing">
                                    <x-ds::alert color="danger" title="Billing Tab">Manage your billing information.</x-ds::alert>
                                </x-ds::tab>
                            </x-ds::tabs>

                            <x-ds::tabs :tabs="['tab1'=>'Design','tab2'=>'Prototype','tab3'=>'Review']" variant="pills">
                                <x-ds::tab id="tab1"><p class="text-sm text-zinc-600 dark:text-zinc-400">Design content.</p></x-ds::tab>
                                <x-ds::tab id="tab2"><p class="text-sm text-zinc-600 dark:text-zinc-400">Prototype content.</p></x-ds::tab>
                                <x-ds::tab id="tab3"><p class="text-sm text-zinc-600 dark:text-zinc-400">Review content.</p></x-ds::tab>
                            </x-ds::tabs>
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Steps --}}
                <x-ds::card class="lg:col-span-2">
                    <x-ds::card-header title="Steps / Stepper" />
                    <x-ds::card-body>
                        <x-ds::steps>
                            <x-ds::step number="1" title="Account" description="Create your account." status="completed" />
                            <x-ds::step number="2" title="Profile" description="Add your details."   status="current" />
                            <x-ds::step number="3" title="Team"    description="Invite teammates."   status="pending" />
                            <x-ds::step number="4" title="Launch"  description="Go live!"            status="pending" />
                        </x-ds::steps>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Accordion --}}
                <x-ds::card class="lg:col-span-2">
                    <x-ds::card-header title="Accordion" />
                    <x-ds::card-body>
                        <x-ds::accordion>
                            <x-ds::accordion-item title="What is DS UI?" icon="information-circle" :open="true">
                                DS UI is a complete, production-ready design system for Laravel Livewire 4. It provides 50+ customizable components built with Tailwind CSS v4 and Alpine.js.
                            </x-ds::accordion-item>
                            <x-ds::accordion-item title="How do I install it?">
                                Run <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">composer require ds/ui</code> in your Laravel project, then add <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">@dsStyles</code> to your layout file.
                            </x-ds::accordion-item>
                            <x-ds::accordion-item title="Is dark mode supported?">
                                Yes! Every component has full dark mode support out of the box.
                            </x-ds::accordion-item>
                            <x-ds::accordion-item title="Can I customize the tokens?" icon="adjustments-horizontal">
                                Absolutely. Publish the config with <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">php artisan vendor:publish --tag=ds-config</code> and edit <code class="text-xs bg-zinc-100 dark:bg-zinc-800 px-1.5 py-0.5 rounded">config/ds.php</code>.
                            </x-ds::accordion-item>
                        </x-ds::accordion>
                    </x-ds::card-body>
                </x-ds::card>

            </div>

        </x-ds::section>
    </section>

    {{-- ─── SECTION: FEEDBACK ──────────────────────────────── --}}
    <section id="feedback">
        <x-ds::section title="Feedback" description="Alerts, progress, skeletons, and empty states.">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Alerts --}}
                <x-ds::card>
                    <x-ds::card-header title="Alert" description="Soft and solid variants for every color." />
                    <x-ds::card-body>
                        <x-ds::stack gap="3">
                            <x-ds::alert color="info"    title="Heads up!">This is an informational message.</x-ds::alert>
                            <x-ds::alert color="success" title="All done!">Your changes have been saved.</x-ds::alert>
                            <x-ds::alert color="warning" title="Caution">Review before proceeding.</x-ds::alert>
                            <x-ds::alert color="danger"  title="Error" :dismissible="true">Something went wrong. Click to dismiss.</x-ds::alert>
                            <x-ds::alert color="neutral">A neutral note without a title.</x-ds::alert>
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Toast trigger --}}
                <x-ds::card>
                    <x-ds::card-header title="Toast Notifications" description="Click to trigger toast messages." />
                    <x-ds::card-body>
                        <x-ds::stack gap="3">
                            @foreach([
                                ['type'=>'success','label'=>'Success Toast','color'=>'success'],
                                ['type'=>'error',  'label'=>'Error Toast',  'color'=>'danger'],
                                ['type'=>'warning','label'=>'Warning Toast','color'=>'warning'],
                                ['type'=>'info',   'label'=>'Info Toast',   'color'=>'info'],
                            ] as $t)
                                <x-ds::button
                                    color="{{ $t['color'] }}"
                                    variant="soft"
                                    :full="true"
                                    onclick="DsToast.{{ $t['type'] }}('{{ $t['label'] }}', {title: '{{ ucfirst($t['type']) }}!'})">
                                    Show {{ $t['label'] }}
                                </x-ds::button>
                            @endforeach
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Progress --}}
                <x-ds::card>
                    <x-ds::card-header title="Progress" description="Determinate progress bars." />
                    <x-ds::card-body>
                        <x-ds::stack gap="4">
                            <x-ds::progress label="Upload Progress" :value="72" :show-value="true" color="primary" />
                            <x-ds::progress label="Storage Used" :value="45" color="success" size="md" />
                            <x-ds::progress label="Striped + Animated" :value="60" :striped="true" :animated="true" color="info" size="lg" />
                            <x-ds::progress-bar :segments="[
                                ['label' => 'Used',  'value' => 45, 'color' => 'bg-blue-600'],
                                ['label' => 'Other', 'value' => 20, 'color' => 'bg-violet-500'],
                                ['label' => 'Free',  'value' => 35, 'color' => 'bg-zinc-200 dark:bg-zinc-700'],
                            ]" />
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Skeleton --}}
                <x-ds::card>
                    <x-ds::card-header title="Skeleton" description="Loading placeholders." />
                    <x-ds::card-body>
                        <x-ds::stack gap="5">
                            <x-ds::skeleton variant="avatar" />
                            <x-ds::skeleton variant="list" :lines="3" />
                        </x-ds::stack>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Empty state --}}
                <x-ds::card class="lg:col-span-2">
                    <x-ds::card-header title="Empty State" />
                    <x-ds::card-body>
                        <x-ds::empty-state
                            icon="inbox"
                            title="No messages yet"
                            description="When you receive messages they'll show up here. Start a new conversation to get going.">
                            <x-ds::button color="primary" icon="plus">
                                New Message
                            </x-ds::button>
                        </x-ds::empty-state>
                    </x-ds::card-body>
                </x-ds::card>

            </div>

        </x-ds::section>
    </section>

    {{-- ─── SECTION: DATA DISPLAY ──────────────────────────── --}}
    <section id="data">
        <x-ds::section title="Data Display" description="Stats, tables, and timeline.">

            {{-- Stats --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-ds::stat label="Total Revenue"  value="$48,295" trend="up"   trend-value="+12.5%" description="vs last month" icon="currency-dollar" icon-color="success" />
                <x-ds::stat label="Active Users"   value="3,842"   trend="up"   trend-value="+4.1%"  description="vs last month" icon="users"          icon-color="primary" />
                <x-ds::stat label="Bounce Rate"    value="23.5%"   trend="down" trend-value="-2.8%"  description="vs last month" icon="arrow-trending-down" icon-color="warning" />
                <x-ds::stat label="Avg. Session"   value="4m 32s"  trend="up"   trend-value="+0.5m"  description="vs last month" icon="clock"          icon-color="info" />
            </div>

            {{-- Table --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Table" description="Sortable, filterable data table.">
                    <x-slot name="actions">
                        <x-ds::button variant="outline" size="sm" icon="arrow-down-tray">Export</x-ds::button>
                        <x-ds::button size="sm" icon="plus">Add Row</x-ds::button>
                    </x-slot>
                </x-ds::card-header>
                <x-ds::table
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
            </x-ds::card>

            {{-- Timeline --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Timeline" description="Activity and event history." />
                <x-ds::card-body>
                    <x-ds::timeline>
                        <x-ds::timeline-item
                            title="Design system published"
                            description="Version 1.0.0 is now live and available for all teams."
                            date="2 hours ago"
                            icon="rocket-launch"
                            color="primary" />
                        <x-ds::timeline-item
                            title="Tests all passed"
                            description="All 248 tests pass with 100% component coverage."
                            date="4 hours ago"
                            icon="check-circle"
                            color="success" />
                        <x-ds::timeline-item
                            title="Dark mode added"
                            description="Full dark mode support for all 50+ components."
                            date="Yesterday"
                            icon="moon"
                            color="secondary" />
                        <x-ds::timeline-item
                            title="Initial commit"
                            description="Project started with package scaffolding."
                            date="3 days ago"
                            icon="code-bracket"
                            color="neutral"
                            :last="true" />
                    </x-ds::timeline>
                </x-ds::card-body>
            </x-ds::card>

            {{-- Live DataTable --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Interactive DataTable" description="Search, sort, and paginate — powered by Livewire." />
                <x-ds::card-body>
                    <livewire:ds::data-table
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
                </x-ds::card-body>
            </x-ds::card>

        </x-ds::section>
    </section>

    {{-- ─── SECTION: OVERLAY ───────────────────────────────── --}}
    <section id="overlay">
        <x-ds::section title="Overlay & Interactive" description="Modals, drawers, dropdowns, tooltips, and more.">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- Modal --}}
                <x-ds::card :hover="true">
                    <x-ds::card-body>
                        <div class="text-center py-2">
                            <flux:icon.squares-2x2 class="h-8 w-8 text-blue-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Modal Dialog</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Full-featured modal with Livewire.</p>
                            <livewire:ds::modal modal-id="demo-modal" title="Demo Modal" description="This modal is powered by Livewire." size="md">
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                    This is the modal body. You can put any content here — forms, tables, images, etc.
                                </p>
                                <x-slot name="footer">
                                    <x-ds::button variant="outline" color="neutral" onclick="DsModal.close('demo-modal')">Cancel</x-ds::button>
                                    <x-ds::button color="primary">Confirm</x-ds::button>
                                </x-slot>
                            </livewire:ds::modal>
                            <x-ds::button variant="outline" size="sm" onclick="DsModal.open('demo-modal')">
                                Open Modal
                            </x-ds::button>
                        </div>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Drawer --}}
                <x-ds::card :hover="true">
                    <x-ds::card-body>
                        <div class="text-center py-2">
                            <flux:icon.chevron-double-right class="h-8 w-8 text-violet-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Drawer / Slide-over</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Slide-in panel from any side.</p>
                            <livewire:ds::drawer drawer-id="demo-drawer" title="Edit Profile" position="right" size="md">
                                <x-ds::stack gap="4">
                                    <x-ds::input label="Name" value="John Doe" />
                                    <x-ds::input label="Email" type="email" value="john@example.com" />
                                    <x-ds::textarea label="Bio" placeholder="Tell us about yourself..." />
                                </x-ds::stack>
                                <x-slot name="footer">
                                    <x-ds::button variant="outline" color="neutral" onclick="DsDrawer.close('demo-drawer')">Cancel</x-ds::button>
                                    <x-ds::button color="primary">Save</x-ds::button>
                                </x-slot>
                            </livewire:ds::drawer>
                            <x-ds::button variant="outline" size="sm" onclick="DsDrawer.open('demo-drawer')">
                                Open Drawer
                            </x-ds::button>
                        </div>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Dropdown --}}
                <x-ds::card :hover="true">
                    <x-ds::card-body>
                        <div class="text-center py-2">
                            <flux:icon.chevron-down class="h-8 w-8 text-emerald-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Dropdown Menu</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Alpine.js powered context menus.</p>
                            <x-ds::dropdown>
                                <x-slot name="trigger">
                                    <x-ds::button size="sm" variant="outline" icon-trailing="chevron-down">
                                        Options
                                    </x-ds::button>
                                </x-slot>
                                <x-ds::dropdown-item icon="pencil" href="#">Edit</x-ds::dropdown-item>
                                <x-ds::dropdown-item icon="document-duplicate" href="#">Duplicate</x-ds::dropdown-item>
                                <x-ds::dropdown-item icon="arrow-up-on-square" href="#">Export</x-ds::dropdown-item>
                                <x-ds::dropdown-item :separator="true" />
                                <x-ds::dropdown-item icon="trash" :danger="true" href="#">Delete</x-ds::dropdown-item>
                            </x-ds::dropdown>
                        </div>
                    </x-ds::card-body>
                </x-ds::card>

                {{-- Tooltip --}}
                <x-ds::card :hover="true">
                    <x-ds::card-body>
                        <div class="text-center py-2">
                            <flux:icon.chat-bubble-left class="h-8 w-8 text-amber-500 mx-auto mb-3" />
                            <p class="font-semibold mb-1">Tooltip</p>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">Hover-triggered contextual hints.</p>
                            <div class="flex items-center justify-center gap-2 flex-wrap">
                                @foreach(['top','right','bottom','left'] as $pos)
                                    <x-ds::tooltip text="{{ ucfirst($pos) }}" position="{{ $pos }}">
                                        <x-ds::button size="xs" variant="soft">{{ ucfirst($pos) }}</x-ds::button>
                                    </x-ds::tooltip>
                                @endforeach
                            </div>
                        </div>
                    </x-ds::card-body>
                </x-ds::card>

            </div>

            {{-- Collapsible --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Collapsible" />
                <x-ds::card-body>
                    <x-ds::collapsible label="Show advanced settings" icon="adjustments-horizontal">
                        <x-ds::panel color="neutral" class="mt-2">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <x-ds::input label="API Key" type="password" placeholder="sk-..." />
                                <x-ds::select label="Region" :options="['us-east'=>'US East','eu-west'=>'EU West','ap-south'=>'AP South']" />
                            </div>
                        </x-ds::panel>
                    </x-ds::collapsible>
                </x-ds::card-body>
            </x-ds::card>

            {{-- Command Palette trigger --}}
            <x-ds::card class="mt-6">
                <x-ds::card-header title="Command Palette" description="Press ⌘K to open globally." />
                <x-ds::card-body>
                    <div class="flex items-center gap-3 flex-wrap">
                        <x-ds::button
                            variant="outline"
                            color="neutral"
                            icon="magnifying-glass"
                            onclick="window.DsCommandPalette.open()">
                            Open Command Palette
                        </x-ds::button>
                        <x-ds::inline gap="1.5" align="center">
                            <span class="text-sm text-zinc-500">Shortcut:</span>
                            <x-ds::kbd>⌘</x-ds::kbd>
                            <x-ds::kbd>K</x-ds::kbd>
                        </x-ds::inline>
                    </div>
                </x-ds::card-body>
            </x-ds::card>

        </x-ds::section>
    </section>

    {{-- ─── FOOTER ─────────────────────────────────────────── --}}
    <footer class="border-t border-zinc-200 dark:border-zinc-800 pt-12 pb-6">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <div class="h-6 w-6 rounded-md bg-gradient-to-br from-blue-600 to-violet-600 flex items-center justify-center">
                    <span class="text-white font-bold text-xs">DS</span>
                </div>
                <span class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">DS UI</span>
                <x-ds::badge size="xs" color="success">v1.0.0</x-ds::badge>
            </div>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                Built for Laravel Livewire 4 · Tailwind v4 · MIT License
            </p>
        </div>
    </footer>

</div>

@fluxScripts
@dsScripts
@livewireScripts
</body>
</html>
