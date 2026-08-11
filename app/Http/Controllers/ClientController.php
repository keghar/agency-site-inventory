<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $title = 'Agency Site Inventory';

        return view('welcome', compact('clients', 'title'));
    }

    public function create()
    {
        return view('clients.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'company' => 'nullable|string|max:255',
        ]);

        $client = Client::create($validated);

        return redirect()->route('clients.show', $client)->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('clients', 'email')->ignore($client),],
            'company' => 'nullable|string|max:255',
        ]);
        $client->update($validated);
        return redirect()->route('clients.show', $client)->with('success', 'Client Updated Successfully');
    }
    public function destroy(Client $client)
    {
        // Use the static destroy method to ensure an ID is provided if delete() requires an argument
        Client::destroy($client->id);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
