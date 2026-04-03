<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect()->route('design-system');
})->name('home');

Route::get('/design-system', function () {
    return view('pages.design-system');
})->name('design-system');

Route::get('/wirestack-docs', function () {
    return redirect()->route('docs.index');
})->name('wirestack-docs');

// ─── Documentation Wirestack UI ────────────────────────────────────────────
Route::prefix('docs')->name('docs.')->group(function () {
    // Getting Started
    Route::get('/',              fn () => view('docs.index'))->name('index');
    Route::get('/installation',  fn () => view('docs.installation'))->name('installation');
    Route::get('/configuration', fn () => view('docs.configuration'))->name('configuration');
    Route::get('/tokens',        fn () => view('docs.tokens'))->name('tokens');

    // Atomes
    Route::get('/button',       fn () => view('docs.button'))->name('button');
    Route::get('/badge',        fn () => view('docs.badge'))->name('badge');
    Route::get('/avatar',       fn () => view('docs.avatar'))->name('avatar');
    Route::get('/chip',         fn () => view('docs.chip'))->name('chip');
    Route::get('/kbd',          fn () => view('docs.kbd'))->name('kbd');
    Route::get('/icon',         fn () => view('docs.icon'))->name('icon');
    Route::get('/spinner',      fn () => view('docs.spinner'))->name('spinner');
    Route::get('/skeleton',     fn () => view('docs.skeleton'))->name('skeleton');
    Route::get('/tooltip',      fn () => view('docs.tooltip'))->name('tooltip');
    Route::get('/divider',      fn () => view('docs.divider'))->name('divider');
    Route::get('/copy-button',  fn () => view('docs.copy-button'))->name('copy-button');

    // Formulaires
    Route::get('/input',        fn () => view('docs.input'))->name('input');
    Route::get('/textarea',     fn () => view('docs.textarea'))->name('textarea');
    Route::get('/select',       fn () => view('docs.select'))->name('select');
    Route::get('/checkbox',     fn () => view('docs.checkbox'))->name('checkbox');
    Route::get('/radio',        fn () => view('docs.radio'))->name('radio');
    Route::get('/toggle',       fn () => view('docs.toggle'))->name('toggle');
    Route::get('/range',        fn () => view('docs.range'))->name('range');
    Route::get('/input-group',  fn () => view('docs.input-group'))->name('input-group');
    Route::get('/form-group',   fn () => view('docs.form-group'))->name('form-group');
    Route::get('/form-section', fn () => view('docs.form-section'))->name('form-section');

    // Layout
    Route::get('/card',         fn () => view('docs.card'))->name('card');
    Route::get('/container',    fn () => view('docs.container'))->name('container');
    Route::get('/section',      fn () => view('docs.section'))->name('section');
    Route::get('/panel',        fn () => view('docs.panel'))->name('panel');
    Route::get('/stack',        fn () => view('docs.stack'))->name('stack');

    // Navigation
    Route::get('/nav',          fn () => view('docs.nav'))->name('nav');
    Route::get('/tabs',         fn () => view('docs.tabs'))->name('tabs');
    Route::get('/breadcrumb',   fn () => view('docs.breadcrumb'))->name('breadcrumb');
    Route::get('/pagination',   fn () => view('docs.pagination'))->name('pagination');
    Route::get('/steps',        fn () => view('docs.steps'))->name('steps');

    // Données
    Route::get('/table',        fn () => view('docs.table'))->name('table');
    Route::get('/stat',         fn () => view('docs.stat'))->name('stat');
    Route::get('/timeline',     fn () => view('docs.timeline'))->name('timeline');
    Route::get('/progress',     fn () => view('docs.progress'))->name('progress');
    Route::get('/code',         fn () => view('docs.code'))->name('code');
    Route::get('/alert',        fn () => view('docs.alert'))->name('alert');
    Route::get('/empty-state',  fn () => view('docs.empty-state'))->name('empty-state');

    // Superpositions
    Route::get('/accordion',    fn () => view('docs.accordion'))->name('accordion');
    Route::get('/collapsible',  fn () => view('docs.collapsible'))->name('collapsible');
    Route::get('/dropdown',     fn () => view('docs.dropdown'))->name('dropdown');
    Route::get('/popover',      fn () => view('docs.popover'))->name('popover');

    // Livewire
    Route::get('/modal',            fn () => view('docs.modal'))->name('modal');
    Route::get('/drawer',           fn () => view('docs.drawer'))->name('drawer');
    Route::get('/toast',            fn () => view('docs.toast'))->name('toast');
    Route::get('/data-table',       fn () => view('docs.data-table'))->name('data-table');
    Route::get('/command-palette',  fn () => view('docs.command-palette'))->name('command-palette');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
