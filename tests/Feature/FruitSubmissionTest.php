<?php

test('loads fruit', function () {
    $user = \App\Models\User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->get('/dashboard');

    $response->assertInertia(fn(\Inertia\Testing\AssertableInertia $page) => $page
        ->has('fruit')
    );
});

test('loads submissions', function () {
    $user = \App\Models\User::factory()
        ->has(\App\Models\FormResponse::factory(5))
        ->create();

    $response = $this
        ->actingAs($user)
        ->get('/dashboard');

    $response->assertInertia(fn(\Inertia\Testing\AssertableInertia $page) => $page
        ->has('submissions', 5)
    );
});

test('can submit favourite fruit', function () {
    $user = \App\Models\User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->postJson('/fruit', [
            'fruit' => ['Apple'],
            'last_eaten' => now()->subDay(),
        ]);

    $response->assertSessionHasNoErrors();
    $response = $this
        ->actingAs($user)
        ->get('/dashboard');

    $response->assertInertia(fn(\Inertia\Testing\AssertableInertia $page) => $page
        ->has('submissions', 1)
    );
});

test('can see favourite fruit after submission', function () {
    $user = \App\Models\User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->postJson('/fruit', [
            'fruit' => ['Apple'],
            'last_eaten' => now()->subDay(),
        ]);

    $response->assertSessionHasNoErrors();
    $response = $this
        ->actingAs($user)
        ->get('/dashboard');

    $response->assertInertia(fn(\Inertia\Testing\AssertableInertia $page) => $page
        ->has('submissions', 1)
    );
});
