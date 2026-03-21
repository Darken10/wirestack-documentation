<?php

namespace Ds\Ui;

class DsStyleRenderer
{
    public function render(): string
    {
        $tokens = config('ds.tokens', []);

        $vars = collect($tokens)
            ->map(fn ($value, $key) => "    --ds-{$key}: {$value};")
            ->implode("\n");

        return "<style>:root {\n{$vars}\n}</style>\n";
    }
}
