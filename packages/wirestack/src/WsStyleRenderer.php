<?php

namespace Wirestack\Ui;

class WsStyleRenderer
{
    public function render(): string
    {
        $cssPath = __DIR__ . '/../resources/css/ds.css';
        $baseCss = file_exists($cssPath) ? file_get_contents($cssPath) : '';

        $tokens = config('ws.tokens', []);

        $overrides = collect($tokens)
            ->map(fn($value, $key) => "    --ds-{$key}: {$value};")
            ->implode("\n");

        $overrideBlock = $overrides ? ":root {\n{$overrides}\n}" : '';

        return "<style>\n{$baseCss}\n{$overrideBlock}\n</style>\n";
    }
}
