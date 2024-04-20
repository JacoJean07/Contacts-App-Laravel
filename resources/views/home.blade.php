@extends('layouts.app')

@section('content')
  <div class="container pt-4 p-3">
    <div class="row">
      <!-- sirve para hacer una targeta por cada valor que tenga el array asociativo $contacts -->
      @forelse ($contacts as $contact)
        <div class="col-md-4 mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h3 class="card-title text-capitalize"> {{ $contact->name }} </h3>
              <p class="m-2"> {{ $contact->phone_number }} </p>
              <p class="m-2"> {{ $contact->email }} </p>
              <p class="m-2"> {{ $contact->age }} </p>
              <!-- LLAMAMOS AL EDIT.PHP Y LE ASIGNAMOS EL ID CON UN ARRAY ASOCIATIVO AL ID QUE PERTENEZCA EL CONTACTO EN EL BUCLE FOREACH -->
              <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-secondary mb-2">Edit Contact</a>
              <!-- LLAMAMOS AL DELETE.PHP Y LE ASIGNAMOS EL ID CON UN ARRAY ASOCIATIVO AL ID QUE PERTENEZCA EL CONTACTO EN EL BUCLE FOREACH -->
              <a href="contacts.destroy" class="btn btn-danger mb-2">Delete Contact</a>
            </div>
          </div>
        </div>
        <!-- si el array asociativo $contacts no tiene nada dentro, entonces imprimir el siguiente div -->
      @empty
        <div class= "col-md-4 mx-auto">
          <div class= "card card-body text-center">
            <p>No contacts saved yet</p>
            <a href="contacts/create">Add One!</a>
          </div>
        </div>
      @endforelse
    </div>
  </div>
@endsection
