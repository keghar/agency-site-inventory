<?php

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;


pest()->use(RefreshDatabase::class);

test('a client can be viewed', function () {

    $client = Client::factory()->create();

    $response = $this->get(
        route('clients.show', $client)
    );

    $response->assertOk();
    $response->assertSee($client->name);
});


test('a client can be created', function () {


    $response = $this->post(
        route('clients.store'),
        [
            'name' => 'Test Client',
            'email' => 'test@example.com',
            'company' => 'Test Company',
            'phone' => '555-555-5555',
        ]
    );

    $client = Client::where('email', 'test@example.com')->first();
    expect($client)->not->toBeNull();

    $response->assertRedirect(
        route('clients.show', $client)
    );

    assertDatabaseHas('clients', [
        'name' => 'Test Client',
        'email' => 'test@example.com',
        'company' => 'Test Company',
        'phone' => '555-555-5555',


    ]);
});

test('a client can be created without a phone number', function () {

    $response = $this->post(
        route('clients.store'),
        [
            'name' => 'Test Client',
            'email' => 'test@example.com',
            'company' => 'Test Company',
        ]
    );

    $client = Client::where('email', 'test@example.com')->first();
    expect($client)->not->toBeNull();

    $response->assertValid();

    $response->assertRedirect(
        route('clients.show', $client)
    );

    assertDatabaseHas('clients', [
        'name' => 'Test Client',
        'email' => 'test@example.com',
        'company' => 'Test Company',
        'phone' => null,
    ]);
});
