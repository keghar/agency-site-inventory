<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Site;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Agency Site Inventory';
        $clientCount = Client::count();
        $siteCount = Site::count();
        $recentSites = Site::latest()->take(3)->get();

        return view('dashboard', compact('title', 'clientCount', 'siteCount', 'recentSites'));
    }
}
