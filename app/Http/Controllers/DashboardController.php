<?php

namespace App\Http\Controllers;

use App\Models\Client; // Import your Client model at the top

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch clients from the database
        $clients = Client::all();

        // Pass the clients to the dashboard view
        return view('dashboard', ['clients' => $clients]);
    }
}
