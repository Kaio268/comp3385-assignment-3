<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display the form to add a new client.
     */
    public function create()
    {
        // Corresponds to GET /clients/add
        // Ensure this matches the name of your Blade file (add.blade.php)
        return view('clients.create');
    }

    /**
     * Store a new client in the database and handle file upload.
     */
    public function store(Request $request)
    {
        // Validate the request data including file upload
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|max:255',
            'address' => 'required|max:255',
            'company_logo' => 'required|image|max:12288', // Validate for image file
        ]);

        // Handle file upload for the company logo
        if ($request->hasFile('company_logo')) {
            $path = $request->file('company_logo')->storeAs('company_logos',$request->file('company_logo')->getClientOriginalName(),'public');
            $validatedData['company_logo'] = $path; // Save the path in the database
        }

        // Create a new client with the validated data
        Client::create($validatedData);

        // Redirect to the dashboard with a success message
        // Make sure 'dashboard' route is correctly defined in your routes/web.php
        return redirect('/dashboard')->with('success', 'New client added successfully.');
    }
}
