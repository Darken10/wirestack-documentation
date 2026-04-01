# Changelog

All notable changes to `wirestack/ui` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

### Added
- Initial public release of Wirestack UI

---

## [1.0.0] - 2024-04-01

### Added
- **70+ Blade components** organized into 7 categories: Atoms, Forms, Layout, Navigation, Feedback, Data Display, Interactive
- **5 Livewire components**: Modal, Drawer, Toast, DataTable, CommandPalette
- Full **dark mode** support on all components
- **Design tokens** system via CSS custom properties (`@wsStyles` directive)
- **`@wsStyles`** directive — injects CSS variables into `<head>`
- **`@wsScripts`** directive — injects JS helpers
- Configurable **prefix** (default: `ws`) for all component tags
- Global **component defaults** via `config/ws.php`
- Tailwind CSS v4 utility-first architecture
- Alpine.js-powered interactive components (Dropdown, Tooltip, Popover, Tabs, Accordion, Collapsible)
- Livewire 4 event system for Modal and Drawer (`ds-modal-open:id`, `ds-drawer-open:id`)
- Toast notification system with `$dispatch('add-toast', {...})`
- DataTable with built-in search, sort, pagination, and row selection
- CommandPalette keyboard-driven search with fuzzy filtering
- `php artisan vendor:publish --tag=ws-config` to publish configuration
- `php artisan vendor:publish --tag=ws-views` to publish and override views
- `php artisan vendor:publish --tag=ws-assets` to publish compiled CSS/JS assets

[Unreleased]: https://github.com/wirestack/ui/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/wirestack/ui/releases/tag/v1.0.0
