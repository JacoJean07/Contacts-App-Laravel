@extends('layouts.app')

@section('content')
  <div class="container center">
    @forelse ($contacts as $contact)
      <div class="d-flex justify-content-between  bg-dark mb-3 rounded px-4 py-2 text-white">
        <div class="col-3">
          <a href="{{ route('contacts.show', $contact->id) }}">
            <img src="/img/logo.gif" class="img-fluid rounded img-responsive" alt="pfp" />
          </a>
        </div>
        <div class="content d-flex justify-content-between align-items-center col-8">
          <div class="contact-name">
            <p>Name:</p>
            <h3>{{ $contact->name }}</h3>
          </div>
          <div class="d-none d-md-block">
            <p>Phone:</p>
            <h3><a class="text-white" href="tel: {{ $contact->phone_number }} ">{{ $contact->phone_number }}</a></h3>
          </div>
          <div class="d-none d-md-block">
            <p>Email:</p>
            <h3><a class="text-white" href="mailto: {{ $contact->email }} ">{{ $contact->email }}</a></h3>
          </div>
          <div class="d-none d-md-block">
            <p>Age:</p>
            <h3>{{ $contact->age }}</h3>
          </div>
        </div>
        <div class="col-1">
          <div class="d-flex justify-content-end">
          <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red"
                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path
                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
              </svg>
            </button>
          </form>
          </div>
        </div>
      </div>
    @empty
      <div class= "col-md-4 mx-auto">
        <div class= "card card-body text-center">
          <p>No contacts saved yet</p>
          <a href="contacts/create">Add One!</a>
        </div>
      </div>
    @endforelse
  </div>
@endsection
