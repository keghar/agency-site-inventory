<?php

use App\Models\Client;
use App\Models\Site;
use App\Models\HostingProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;


pest()->use(RefreshDatabase::class);

test('a site can be viewed', function () {

    $client = Client::factory()->create();


    $site = Site::factory()
        ->for($client)
        ->create();

    $response = $this->get(
        route('sites.show', [$client, $site])
    );

    $response->assertStatus(200);
    $response->assertSee($site->name);
});

test('a site cannot be viewed under the wrong client', function () {
    $clientA = Client::factory()->create();
    $clientB = Client::factory()->create();

    $site = Site::factory()
        ->for($clientA)
        ->create();

    $response = $this->get(
        route('sites.show', [$clientB, $site])
    );

    $response->assertStatus(404);
});
test('a site can be created for a client', function () {
    $client = Client::factory()->create();
    $hostingProvider = HostingProvider::factory()->create();

    $response = $this->post(
        route('sites.store', $client),
        [
            'name' => 'New Site',
            'url' => 'https://newsite.example.com',
            'status' => 'active',
            'notes' => 'New test site',
            'hosting_provider_id' => $hostingProvider->id,
        ]
    );

    $response->assertRedirect(
        route('clients.show', $client)
    );

    assertDatabaseHas('sites', [
        'name' => 'New Site',
        'client_id' => $client->id,
    ]);
});
test('invalid site data is rejected', function () {
    $client = Client::factory()->create();

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

test('a site can be updated', function () {
    $client = Client::factory()->create();

    $site = Site::factory()
        ->for($client)
        ->create();

    $response = $this->patch(
        route('sites.update', [$client, $site]),
        [
            'name' => 'Updated Site',
            'url' => 'https://updated.example.com',
            'status' => 'inactive',
            'notes' => 'Updated notes',
            'hosting_provider_id' => HostingProvider::factory()->create()->id,
        ]
    );

    $response->assertRedirect(
        route('sites.show', [$client, $site])
    );

    $this->assertDatabaseHas('sites', [
        'id' => $site->id,
        'name' => 'Updated Site',
        'url' => 'https://updated.example.com',
        'status' => 'inactive',
        'notes' => 'Updated notes',
    ]);
});

test('a site can be deleted', function () {
    $client = Client::factory()->create();

    $site = Site::factory()
        ->for($client)
        ->create();

    $response = $this->delete(
        route('sites.destroy', [$client, $site])
    );

    $response->assertRedirect(
        route('clients.show', $client)
    );

    $this->assertDatabaseMissing('sites', [
        'id' => $site->id,
    ]);
});
