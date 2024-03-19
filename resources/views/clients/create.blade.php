@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Client</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form to add a new client --}}
        <form action="{{ url('/clients') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- CSRF token for form security --}}

            {{-- Name input --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            {{-- Email input --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            {{-- Telephone input --}}
            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone:</label>
                <input type="text" id="telephone" name="telephone" class="form-control" required>
            </div>

            {{-- Address input --}}
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            {{-- Company logo file input --}}
            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo:</label>
                <input type="file" id="company_logo" name="company_logo" class="form-control" required>
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">Add Client</button>
        </form>
    </div>
@endsection
