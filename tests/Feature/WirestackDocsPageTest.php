<?php

test('wirestack docs page is accessible', function () {
    $response = $this->get(route('wirestack-docs'));

    $response
        ->assertOk()
        ->assertSee('Wirestack Docs')
        ->assertSee('Documentation complete de Wirestack UI');
});
