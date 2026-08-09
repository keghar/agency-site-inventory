<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

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
}
