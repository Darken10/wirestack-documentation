<?php

namespace Wirestack\Ui;

class WsStyleRenderer
{
    public function render(): string
    {
        $tokens = config('ws.tokens', []);

        $vars = collect($tokens)
            ->map(fn ($value, $key) => "    --ws-{$key}: {$value};")
            ->implode("\n");

        return "<style>:root {\n{$vars}\n}</style>\n";
    }
}
