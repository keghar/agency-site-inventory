<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HostingProvider;

class HostingProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            'Kinsta',
            'StableHost',
            'Local / Development',
            'Other',
        ];

        foreach ($providers as $provider) {
            HostingProvider::firstOrCreate(['name' => $provider]);
        }
    }
}
