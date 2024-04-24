@extends('layouts.app')

@section('content')
  <div class="container center">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            Contact info
            <a href="{{ route('home') }}" class="btn btn-primary ml-auto">Go back</a>
          </div>

          <div class="card-body">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Phone Number:</strong>
              <a href="tel:{{ $contact->phone_number }}">
                {{ $contact->phone_number }}
              </a>
            </p>
            <p><strong>Email:</strong>
              <a href="mailto:{{ $contact->email }}">
                {{ $contact->email }}
              </a>
            </p>
            <p><strong>Age:</strong> {{ $contact->age }}</p>
            <p><strong>Created:</strong> {{ $contact->created_at }}</p>
            <p><strong>Updated:</strong> {{ $contact->updated_at }}</p>
            <div class="d-flex">
              <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-secondary mb-2">Edit Contact</a>
              <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Contact</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
