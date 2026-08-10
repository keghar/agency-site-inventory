<?php

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;


pest()->use(RefreshDatabase::class);

test('a site can be viewed', function () {
    $client = Client::create([
        'name' => 'Test Client',
        'email' => 'test@example.com',
        'company' => 'Test Company',
    ]);

    $site = $client->sites()->create([
        'name' => 'Test Site',
        'url' => 'https://example.com',
        'status' => 'active',
        'notes' => 'This is a test site.',
    ]);

    $response = $this->get(
        route('sites.show', [$client, $site])
    );

    $response->assertStatus(200);
    $response->assertSee('Test Site');
});

test('a site cannot be viewed under the wrong client', function () {
    $clientA = Client::create([
        'name' => 'Client A',
        'email' => 'a@example.com',
    ]);

    $clientB = Client::create([
        'name' => 'Client B',
        'email' => 'b@example.com',
    ]);

    $site = $clientA->sites()->create([
        'name' => 'Client A Site',
        'url' => 'https://client-a.example.com',
        'status' => 'active',
    ]);

    $response = $this->get(
        route('sites.show', [$clientB, $site])
    );

    $response->assertStatus(404);
});
test('a site can be created for a client', function () {
    $client = Client::create([
        'name' => 'Test Client',
        'email' => 'test@example.com',
    ]);

    $response = $this->post(
        route('sites.store', $client),
        [
            'name' => 'New Site',
            'url' => 'https://newsite.example.com',
            'status' => 'active',
            'notes' => 'New test site',
        ]
    );

    $response->assertRedirect(
        route('clients.show', $client)
    );

    $this->assertDatabaseHas('sites', [
        'name' => 'New Site',
        'client_id' => $client->id,
    ]);
});
test('invalid site data is rejected', function () {
    $client = Client::create([
        'name' => 'Test Client',
        'email' => 'test@example.com',
    ]);

    $response = $this->from(
        route('sites.create', $client)
    )->post(
        route('sites.store', $client),
        [
            'name' => '',
            'url' => 'not-a-url',
            'status' => 'invalid-status',
        ]
    );

    $response->assertRedirect(
        route('sites.create', $client)
    );

    $response->assertSessionHasErrors([
        'name',
        'url',
        'status',
    ]);

    $this->assertDatabaseCount('sites', 0);
});
