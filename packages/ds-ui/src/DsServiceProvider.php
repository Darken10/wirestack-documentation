<?php

namespace Ds\Ui;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/ds.php',
            'ds'
        );
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ds');

        $this->app->singleton('Ds\Ui\DsStyleRenderer', fn () => new DsStyleRenderer);
        $this->app->singleton('Ds\Ui\DsScriptRenderer', fn () => new DsScriptRenderer);

        $this->registerBladeComponents();
        $this->registerLivewireComponents();
        $this->registerDirectives();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/ds.php' => config_path('ds.php'),
            ], 'ds-config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/ds'),
            ], 'ds-views');

            $this->publishes([
                __DIR__.'/../resources/css' => public_path('vendor/ds/css'),
                __DIR__.'/../resources/js' => public_path('vendor/ds/js'),
            ], 'ds-assets');
        }
    }

    protected function registerBladeComponents(): void
    {
        $prefix = config('ds.prefix', 'ds');

        $components = [
            // Atoms
            'button' => Components\Button::class,
            'badge' => Components\Badge::class,
            'avatar' => Components\Avatar::class,
            'avatar-group' => Components\AvatarGroup::class,
            'spinner' => Components\Spinner::class,
            'icon' => Components\Icon::class,
            'divider' => Components\Divider::class,
            'kbd' => Components\Kbd::class,
            'chip' => Components\Chip::class,

            // Forms
            'input' => Components\Input::class,
            'textarea' => Components\Textarea::class,
            'select' => Components\Select::class,
            'checkbox' => Components\Checkbox::class,
            'radio' => Components\Radio::class,
            'radio-group' => Components\RadioGroup::class,
            'toggle' => Components\Toggle::class,
            'range' => Components\Range::class,
            'form-group' => Components\FormGroup::class,
            'form-section' => Components\FormSection::class,
            'input-group' => Components\InputGroup::class,

            // Layout
            'card' => Components\Card::class,
            'card-header' => Components\CardHeader::class,
            'card-body' => Components\CardBody::class,
            'card-footer' => Components\CardFooter::class,
            'container' => Components\Container::class,
            'section' => Components\Section::class,
            'stack' => Components\Stack::class,
            'inline' => Components\Inline::class,
            'panel' => Components\Panel::class,

            // Navigation
            'breadcrumb' => Components\Breadcrumb::class,
            'pagination' => Components\Pagination::class,
            'steps' => Components\Steps::class,
            'step' => Components\Step::class,
            'nav' => Components\Nav::class,
            'nav-item' => Components\NavItem::class,

            // Feedback
            'alert' => Components\Alert::class,
            'progress' => Components\Progress::class,
            'progress-bar' => Components\ProgressBar::class,
            'skeleton' => Components\Skeleton::class,
            'empty-state' => Components\EmptyState::class,

            // Data Display
            'stat' => Components\Stat::class,
            'stat-group' => Components\StatGroup::class,
            'table' => Components\Table::class,
            'timeline' => Components\Timeline::class,
            'timeline-item' => Components\TimelineItem::class,
            'code' => Components\Code::class,
            'copy-button' => Components\CopyButton::class,

            // Overlay & Interactive (Alpine.js)
            'dropdown' => Components\Dropdown::class,
            'dropdown-item' => Components\DropdownItem::class,
            'tooltip' => Components\Tooltip::class,
            'popover' => Components\Popover::class,
            'tabs' => Components\Tabs::class,
            'tab' => Components\Tab::class,
            'accordion' => Components\Accordion::class,
            'accordion-item' => Components\AccordionItem::class,
            'collapsible' => Components\Collapsible::class,
        ];

        foreach ($components as $alias => $class) {
            Blade::component($class, "{$prefix}::{$alias}");
        }
    }

    protected function registerLivewireComponents(): void
    {
        $prefix = config('ds.prefix', 'ds');

        Livewire::addNamespace(
            $prefix,
            viewPath: __DIR__.'/../resources/views/livewire',
            classNamespace: 'Ds\\Ui\\Livewire',
            classPath: __DIR__.'/Livewire',
        );
    }

    protected function registerDirectives(): void
    {
        // @dsStyles — inject design token CSS variables into <head>
        Blade::directive('dsStyles', function () {
            return "<?php echo app('Ds\\\\Ui\\\\DsStyleRenderer')->render(); ?>";
        });

        // @dsScripts — inject JS helpers
        Blade::directive('dsScripts', function () {
            return "<?php echo app('Ds\\\\Ui\\\\DsScriptRenderer')->render(); ?>";
        });
    }
}
