@php
$navGroups = [
    'Démarrage' => [
        ['label' => 'Introduction',     'route' => 'docs.index',         'icon' => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25'],
        ['label' => 'Installation',     'route' => 'docs.installation',  'icon' => 'M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3'],
        ['label' => 'Configuration',    'route' => 'docs.configuration', 'icon' => 'M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
        ['label' => 'Design Tokens',    'route' => 'docs.tokens',        'icon' => 'M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z'],
        ['label' => 'Theming',          'route' => 'docs.theming',       'icon' => 'M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42'],
        ['label' => 'Directives Blade', 'route' => 'docs.directives',    'icon' => 'M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5'],
        ['label' => 'API JavaScript',   'route' => 'docs.javascript-api','icon' => 'M14.25 9.75 16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z'],
    ],
    'Atomes' => [
        ['label' => 'Button',       'route' => 'docs.button'],
        ['label' => 'Badge',        'route' => 'docs.badge'],
        ['label' => 'Avatar',       'route' => 'docs.avatar'],
        ['label' => 'Chip',         'route' => 'docs.chip'],
        ['label' => 'Kbd',          'route' => 'docs.kbd'],
        ['label' => 'Icon',         'route' => 'docs.icon'],
        ['label' => 'Spinner',      'route' => 'docs.spinner'],
        ['label' => 'Skeleton',     'route' => 'docs.skeleton'],
        ['label' => 'Tooltip',      'route' => 'docs.tooltip'],
        ['label' => 'Divider',      'route' => 'docs.divider'],
        ['label' => 'CopyButton',   'route' => 'docs.copy-button'],
    ],
    'Formulaires' => [
        ['label' => 'Input',        'route' => 'docs.input'],
        ['label' => 'Textarea',     'route' => 'docs.textarea'],
        ['label' => 'Select',       'route' => 'docs.select'],
        ['label' => 'Checkbox',     'route' => 'docs.checkbox'],
        ['label' => 'Radio',        'route' => 'docs.radio'],
        ['label' => 'Toggle',       'route' => 'docs.toggle'],
        ['label' => 'Range',        'route' => 'docs.range'],
        ['label' => 'InputGroup',   'route' => 'docs.input-group'],
        ['label' => 'FormGroup',    'route' => 'docs.form-group'],
        ['label' => 'FormSection',  'route' => 'docs.form-section'],
    ],
    'Layout' => [
        ['label' => 'Card',         'route' => 'docs.card'],
        ['label' => 'Container',    'route' => 'docs.container'],
        ['label' => 'Section',      'route' => 'docs.section'],
        ['label' => 'Panel',        'route' => 'docs.panel'],
        ['label' => 'Stack & Inline','route' => 'docs.stack'],
    ],
    'Navigation' => [
        ['label' => 'Nav',          'route' => 'docs.nav'],
        ['label' => 'Tabs',         'route' => 'docs.tabs'],
        ['label' => 'Breadcrumb',   'route' => 'docs.breadcrumb'],
        ['label' => 'Pagination',   'route' => 'docs.pagination'],
        ['label' => 'Steps',        'route' => 'docs.steps'],
    ],
    'Données' => [
        ['label' => 'Table',        'route' => 'docs.table'],
        ['label' => 'Stat',         'route' => 'docs.stat'],
        ['label' => 'Timeline',     'route' => 'docs.timeline'],
        ['label' => 'Progress',     'route' => 'docs.progress'],
        ['label' => 'Code',         'route' => 'docs.code'],
        ['label' => 'Alert',        'route' => 'docs.alert'],
        ['label' => 'EmptyState',   'route' => 'docs.empty-state'],
    ],
    'Superpositions' => [
        ['label' => 'Accordion',    'route' => 'docs.accordion'],
        ['label' => 'Collapsible',  'route' => 'docs.collapsible'],
        ['label' => 'Dropdown',     'route' => 'docs.dropdown'],
        ['label' => 'Popover',      'route' => 'docs.popover'],
    ],
    'Livewire' => [
        ['label' => 'Modal',            'route' => 'docs.modal'],
        ['label' => 'Drawer',           'route' => 'docs.drawer'],
        ['label' => 'Toast',            'route' => 'docs.toast'],
        ['label' => 'DataTable',        'route' => 'docs.data-table'],
        ['label' => 'CommandPalette',   'route' => 'docs.command-palette'],
    ],
];

$currentRoute = request()->route()->getName();
@endphp
<!DOCTYPE html>
<html lang="fr"
    x-data="{
        dark: localStorage.getItem('ws-docs-dark') === 'true'
            || (localStorage.getItem('ws-docs-dark') === null && window.matchMedia('(prefers-color-scheme: dark)').matches),
        sidebar: false,
        search: '',
        get filteredNav() {
            if (!this.search.trim()) return null;
            const q = this.search.toLowerCase();
            const result = {};
            document.querySelectorAll('[data-nav-label]').forEach(el => {
                if (el.dataset.navLabel.toLowerCase().includes(q)) {
                    el.style.display = '';
                } else {
                    el.style.display = 'none';
                }
            });
        }
    }"
    x-init="$watch('dark', v => localStorage.setItem('ws-docs-dark', v))"
    :class="{ 'dark': dark }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Wirestack UI' }} — Documentation</title>
    <meta name="description" content="Documentation complète de Wirestack UI — composants Blade et Livewire pour Laravel.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wsStyles
    @livewireStyles
    <link rel="stylesheet" href="/prism-theme.css">
    <style>
        [x-cloak] { display: none !important; }
        .doc-content h2 { scroll-margin-top: 72px; }
        .doc-content h3 { scroll-margin-top: 72px; }
        pre.code-block {
            font-family: 'Fira Code', 'JetBrains Mono', 'Cascadia Code', Consolas, monospace;
            font-size: 0.8125rem;
            line-height: 1.7;
            tab-size: 2;
            overflow-x: auto;
        }
        .sidebar-scrollbar::-webkit-scrollbar { width: 4px; }
        .sidebar-scrollbar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 2px; }
        .dark .sidebar-scrollbar::-webkit-scrollbar-thumb { background: #374151; }
        /* Prism — transparent bg so zinc-950 shows through */
        pre[class*="language-"], code[class*="language-"] { background: transparent !important; }
        pre.code-block { padding: 0 !important; margin: 0 !important; }
        pre.code-block code { display: block; padding: 1.25rem !important; }
    </style>
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

{{-- Toast manager (pour les démos) --}}
<livewire:ws::toast />

{{-- ─── TOP HEADER ─────────────────────────────────────────────────── --}}
<header class="fixed top-0 left-0 right-0 z-50 h-14 bg-white dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-800 flex items-center px-4 gap-3">
    {{-- Mobile menu --}}
    <button @click="sidebar = !sidebar" class="lg:hidden p-1.5 rounded-md text-zinc-500 hover:text-zinc-900 dark:hover:text-zinc-100 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" aria-label="Menu">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>

    {{-- Logo --}}
    <a href="{{ route('docs.index') }}" class="flex items-center gap-2.5 shrink-0">
        <div class="h-7 w-7 rounded-lg bg-gradient-to-br from-blue-600 to-violet-600 flex items-center justify-center">
            <span class="text-white font-bold text-xs">WS</span>
        </div>
        <div class="hidden sm:flex items-baseline gap-1.5">
            <span class="font-semibold text-zinc-900 dark:text-zinc-100 text-sm">Wirestack UI</span>
            <span class="text-xs text-zinc-400">v1.0</span>
        </div>
    </a>

    <div class="hidden lg:block w-px h-5 bg-zinc-200 dark:bg-zinc-700"></div>

    {{-- Search --}}
    <div class="flex-1 max-w-xs">
        <label class="flex items-center gap-2 h-8 px-3 bg-zinc-100 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all cursor-text">
            <svg class="h-3.5 w-3.5 text-zinc-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803a7.5 7.5 0 0 0 10.607 0Z"/>
            </svg>
            <input x-model="search" @input="filteredNav" type="search" placeholder="Rechercher un composant…" class="bg-transparent outline-none text-xs text-zinc-700 dark:text-zinc-300 placeholder:text-zinc-400 w-full" />
        </label>
    </div>

    <div class="ml-auto flex items-center gap-2">
        {{-- Lien Design System --}}
        <a href="{{ route('design-system') }}" class="hidden sm:flex items-center gap-1.5 text-xs text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 px-2.5 py-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z"/>
            </svg>
            Démo
        </a>

        {{-- GitHub --}}
        <a href="#" class="hidden sm:flex p-1.5 text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" aria-label="GitHub">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
            </svg>
        </a>

        {{-- Dark mode toggle --}}
        <button @click="dark = !dark" class="p-1.5 text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" aria-label="Toggle dark mode">
            <svg x-show="!dark" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"/>
            </svg>
            <svg x-show="dark" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/>
            </svg>
        </button>
    </div>
</header>

{{-- ─── LAYOUT ──────────────────────────────────────────────────────── --}}
<div class="flex pt-14 min-h-screen">

    {{-- ─── SIDEBAR DESKTOP ────────────────────────────────────────── --}}
    <aside class="hidden lg:flex flex-col fixed left-0 top-14 bottom-0 w-64 bg-white dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-800 overflow-y-auto sidebar-scrollbar">
        <nav class="py-4 px-3 space-y-1">
            @foreach($navGroups as $groupLabel => $items)
                <div class="pb-3">
                    <p class="px-2 mb-1.5 text-[11px] font-semibold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">{{ $groupLabel }}</p>
                    @foreach($items as $item)
                        @php $isActive = $currentRoute === $item['route']; @endphp
                        <a href="{{ route($item['route']) }}"
                            data-nav-label="{{ strtolower($item['label']) }}"
                            class="flex items-center gap-2.5 px-2.5 py-1.5 rounded-md text-sm transition-colors
                                {{ $isActive
                                    ? 'bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-medium'
                                    : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">
                            @if(isset($item['icon']))
                                <svg class="h-4 w-4 shrink-0 {{ $isActive ? 'text-blue-600 dark:text-blue-400' : 'text-zinc-400' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                                </svg>
                            @else
                                <span class="h-4 w-4 shrink-0 flex items-center justify-center">
                                    <span class="h-1 w-1 rounded-full {{ $isActive ? 'bg-blue-500' : 'bg-zinc-400' }}"></span>
                                </span>
                            @endif
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </nav>
    </aside>

    {{-- ─── MOBILE SIDEBAR ─────────────────────────────────────────── --}}
    <div x-cloak x-show="sidebar" class="lg:hidden fixed inset-0 z-40" @keydown.escape.window="sidebar = false">
        <div @click="sidebar = false" x-show="sidebar" x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-zinc-900/50"></div>
        <aside x-show="sidebar" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="absolute left-0 top-0 bottom-0 w-72 bg-white dark:bg-zinc-900 shadow-xl overflow-y-auto sidebar-scrollbar">
            <div class="flex items-center justify-between px-4 h-14 border-b border-zinc-200 dark:border-zinc-800">
                <span class="font-semibold text-sm">Documentation</span>
                <button @click="sidebar = false" class="p-1.5 rounded text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <nav class="py-4 px-3 space-y-1">
                @foreach($navGroups as $groupLabel => $items)
                    <div class="pb-3">
                        <p class="px-2 mb-1.5 text-[11px] font-semibold uppercase tracking-wider text-zinc-400 dark:text-zinc-500">{{ $groupLabel }}</p>
                        @foreach($items as $item)
                            @php $isActive = $currentRoute === $item['route']; @endphp
                            <a href="{{ route($item['route']) }}" @click="sidebar = false"
                                class="flex items-center gap-2.5 px-2.5 py-1.5 rounded-md text-sm transition-colors
                                    {{ $isActive
                                        ? 'bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-medium'
                                        : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 hover:bg-zinc-100 dark:hover:bg-zinc-800' }}">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </nav>
        </aside>
    </div>

    {{-- ─── MAIN CONTENT ───────────────────────────────────────────── --}}
    <div class="lg:ml-64 xl:mr-60 flex-1 min-w-0">
        <div class="max-w-4xl mx-auto px-6 lg:px-10 py-10 doc-content" id="doc-content">
            {{ $slot }}
        </div>
    </div>

    {{-- ─── RIGHT SIDEBAR: ON THIS PAGE ───────────────────────────── --}}
    <aside class="hidden xl:block fixed right-0 top-14 bottom-0 w-60 overflow-y-auto sidebar-scrollbar py-8 px-4" id="toc-aside">
        <p class="text-[11px] font-semibold uppercase tracking-wider text-zinc-400 dark:text-zinc-500 mb-3 px-2">Sur cette page</p>
        <nav id="toc-nav" class="space-y-0.5">
            {{-- Populated by JS below --}}
        </nav>
    </aside>
</div>

@wsScripts
@livewireScripts
{{-- Prism.js : synchronous IIFE scripts, guaranteed to run after DOM is fully parsed --}}
<script src="/prism.js"></script>
<script src="/prism-markup-templating.js"></script>
<script src="/prism-php.js"></script>
<script src="/prism-bash.js"></script>
<script src="/prism-json.js"></script>
<script>
(function () {
    // Build "On This Page" TOC from h2 headings in the doc content
    const content = document.getElementById('doc-content');
    const nav = document.getElementById('toc-nav');
    if (!content || !nav) return;

    const headings = content.querySelectorAll('h2');
    if (headings.length < 2) {
        const aside = document.getElementById('toc-aside');
        if (aside) aside.style.display = 'none';
        document.querySelector('.xl\\:mr-60')?.classList.remove('xl:mr-60');
        return;
    }

    headings.forEach(function (h, i) {
        if (!h.id) {
            h.id = 'section-' + i + '-' + h.textContent.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-');
        }
        const a = document.createElement('a');
        a.href = '#' + h.id;
        a.textContent = h.textContent;
        a.className = 'block px-2 py-1 text-xs rounded text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors truncate toc-link';
        nav.appendChild(a);
    });

    // Highlight active section on scroll
    const links = nav.querySelectorAll('.toc-link');
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                links.forEach(function (l) { l.classList.remove('text-blue-600', 'dark:text-blue-400', 'font-medium'); });
                const active = nav.querySelector('a[href="#' + entry.target.id + '"]');
                if (active) active.classList.add('text-blue-600', 'dark:text-blue-400', 'font-medium');
            }
        });
    }, { rootMargin: '-72px 0px -80% 0px' });

    headings.forEach(function (h) { observer.observe(h); });
})();
</script>
</body>
</html>
