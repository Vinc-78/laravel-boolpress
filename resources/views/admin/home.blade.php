@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">{{ __('Ultimi post') }}</div>

  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif

    Ancora nessun dato disponibile
  </div>
</div>
@endsection