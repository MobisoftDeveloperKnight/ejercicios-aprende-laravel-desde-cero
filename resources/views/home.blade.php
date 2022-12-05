@extends('layouts.app')

@section('content')
  <<div class="container pt-4 p-3">
    <div class="row">

      @if ($contacts->count() == 0)
        <div class="col-md-4 mx-auto">
          <div class="card card-body text-center">
            <p>No contacts saved yet</p>
            <a href="add.php">Add One!</a>
          </div>
        </div>
      @else
        @foreach ($contacts as $contact)
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title text-capitalize">{{ $contact->name }}</h3>
                <p class="m-2">{{ $contact->phone_number }}</p>
                <a href="" class="btn btn-secondary mb-2">Edit Contact</a>
                <a href="" class="btn btn-danger mb-2">Delete Contact</a>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
    </div>
  @endsection
