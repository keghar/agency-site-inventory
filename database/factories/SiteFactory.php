<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\Client;
use App\Models\HostingProvider;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends Factory<Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->domainName(),
            'url' => $this->faker->url(),
            'status' => $this->faker->randomElement([
                'active',
                'inactive',
                'pending',
            ]),
            'notes' => $this->faker->sentence(),
            'client_id' => Client::factory(),
            'hosting_provider_id' => HostingProvider::factory(),
        ];
    }
}
