@extends('layouts.admin')

@section('title', 'Elenco utenti')

@section('content')
<div class="card">
  <div class="card-header">{{ __('Utenti registrati') }}</div>

  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif

    @if(count($usersList) === 0)
    Ancora nessun dato disponibile
    @else
    <ul class="list-group">
      @foreach($usersList as $user)
      <li
        class="list-group-item d-flex align-items-center justify-content-between">
        {{$user->name}} - {{$user->email}} ({{$user->role}})

        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-link">
          Modifica
        </a>
      </li>
      @endforeach
    </ul>
    @endif

  </div>
</div>
@endsection