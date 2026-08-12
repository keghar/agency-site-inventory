<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Site;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index(Request $request)
    {

        $validated = $request->validate([
            'status' => ['nullable', 'string', 'in:active,inactive,pending'],
        ]);
        $search = $request->query('search');
        $status = $validated['status'] ?? null;


        $sites = Site::with('client')

            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('url', 'like', "%{$search}%");
                });
            })

            ->when($status, function ($query, $status) {

                $query->where('status', $status);
            })

            ->get();

        $title = 'Sites we manage';

        return view('sites.index', compact('sites', 'title'));
    }


    #Create Site
    public function create(Client $client)
    {
        return view('sites.create', compact('client'));
    }

    #store Created Site
    public function store(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:sites,url',
            'status' => 'required|in:active,inactive,pending',
            'notes' => 'nullable|string',
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
        return view('sites.edit', compact('client', 'site'));
    }

    #update site
    public function update(Request $request, Client $client, Site $site)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:sites,url,' . $site->id,
            'status' => 'required|in:active,inactive,pending',
            'notes' => 'nullable|string',
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
