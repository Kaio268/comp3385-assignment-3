@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="display-5 fw-bold">Dashboard</h1>
        <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients, and much more.</p>
        
        <!-- Create Client button, conditional display based on route existence -->
            <a href="{{ url('/clients/create') }}" class="btn btn-primary mb-3">+ Create Client</a>
        
        <!-- Display Clients -->
        <div class="row">
            @foreach ($clients as $client)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if ($client->company_logo)
                            <img src="{{ asset('storage/' . $client->company_logo) }}" class="card-img-top" alt="{{ $client->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $client->name }}</h5>
                            <p class="card-text">{{ $client->email }}</p>
                            <p class="card-text">{{ $client->telephone }}</p>
                            <p class="card-text">{{ $client->address }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
