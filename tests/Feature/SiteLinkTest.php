<?php

use App\Models\Client;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;

pest()->use(RefreshDatabase::class);

test('a link can be added to a site', function () {

    $client = Client::factory()->create();
    $site = Site::factory()->for($client)->create();




    $response = $this->post(route('site_links.store', ['client' => $client, 'site' => $site]), [
        'url' => 'https://example.com',
        'label' => 'Example',
        'type' => 'documentation',
    ]);

    $response->assertRedirect(route('sites.show', ['client' => $client, 'site' => $site]));

    assertDatabaseHas('site_links', [
        'site_id' => $site->id,
        'url' => 'https://example.com',
        'label' => 'Example',
        'type' => 'documentation',
    ]);
});
