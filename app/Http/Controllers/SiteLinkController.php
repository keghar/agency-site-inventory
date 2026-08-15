<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Site;
use App\Models\SiteLink;
use Illuminate\Http\Request;

class SiteLinkController extends Controller
{
    public function create(Client $client, Site $site)
    {
        return view(
            'site_links.create',
            compact('client', 'site')
        );
    }

    public function store(
        Request $request,
        Client $client,
        Site $site
    ) {
        $validatedData = $request->validate([
            'url' => ['required', 'url'],
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        $site->links()->create($validatedData);

        return redirect()
            ->route('sites.edit', [$client, $site])
            ->with('success', 'Link added successfully.');
    }

    public function edit(
        Client $client,
        Site $site,
        SiteLink $link
    ) {
        return view(
            'site_links.edit',
            compact('client', 'site', 'link')
        );
    }

    public function update(
        Request $request,
        Client $client,
        Site $site,
        SiteLink $link
    ) {
        $validatedData = $request->validate([
            'url' => ['required', 'url'],
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        $link->update($validatedData);

        return redirect()
            ->route('sites.edit', [$client, $site])
            ->with('success', 'Link updated successfully.');
    }

    public function destroy(
        Client $client,
        Site $site,
        SiteLink $link
    ) {
        $link->delete();

        return redirect()
            ->route('sites.edit', [$client, $site])
            ->with('success', 'Link deleted successfully.');
    }
}
