<?php

test('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('design-system'));
});
