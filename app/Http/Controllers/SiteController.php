<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Site;

use Illuminate\Http\Request;
use App\Models\HostingProvider;

class SiteController extends Controller
{

    public function index()
    {

        $title = 'Sites we manage';

        return view('sites.index', compact('title'));
    }




    #Create Site
    public function create(Client $client)
    {
        $hostingProviders = HostingProvider::all();
        return view('sites.create', compact('client', 'hostingProviders'));
    }

    #store Created Site
    public function store(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:sites,url',
            'status' => 'required|in:active,inactive,pending',
            'notes' => 'nullable|string',
            'hosting_provider_id' => 'required|exists:hosting_providers,id',
        ]);

        $client->sites()->create($validated);

        return redirect()->route('clients.show', $client)->with('success', 'Site created successfully.');
    }

    #show site
    public function show(Client $client, Site $site)
    {
        return view('sites.show', compact('client', 'site'));
    }

    #edit Site
    public function edit(Client $client, Site $site)
    {
        $hostingProviders = HostingProvider::all();
        return view('sites.edit', compact('client', 'site', 'hostingProviders'));
    }

    #update site
    public function update(Request $request, Client $client, Site $site)
    {


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:sites,url,' . $site->id,
            'status' => 'required|in:active,inactive,pending',
            'notes' => 'nullable|string',
            'hosting_provider_id' => 'required|exists:hosting_providers,id',
        ]);
        $site->update($validated);
        return redirect()->route('sites.show', [$client, $site])->with('success', 'Site Updated Successfully');
    }

    #delete site
    public function destroy(Client $client, Site $site)
    {
        Site::destroy($site->id);

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Site deleted successfully.');
    }
}
