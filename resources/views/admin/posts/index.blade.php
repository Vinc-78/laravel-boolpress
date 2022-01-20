@extends('layouts.admin')

@section('title', 'Elenco Posts')

@section('content')
<div class="card">
  <div class="card-header">{{ __('Utenti creati') }}</div>

  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif

    @if(count($postList) === 0)
    Ancora nessun dato disponibile
    @else
    <ul class="list-group">
      @foreach($postList as $post)
      <li
        class="list-group-item d-flex align-items-center justify-content-between">
        {{$post->name}} - {{$post->email}}
        ({{$post->role}})

        <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-link">
          Modifica
        </a>
      </li>
      @endforeach
    </ul>
    @endif

  </div>
</div>
@endsection