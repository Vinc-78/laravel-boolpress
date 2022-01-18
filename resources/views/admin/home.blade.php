@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1> Sei in Admin.home </h1>

                    
                    
                    {{ __('Sei loggato') }}

                    @if(Route::has("admin.users.index") && Auth::user()->role === "admin")
                    <li style="list-style: none;" class="nav-item active">
                        <a class="nav-link" href="{{route('admin.users.index')}}">
                        
                        <span style="color:blue; font-weight:bolder;">
                            Lista Utenti</span>
                        </a>
                    
                    </li>
                @endif
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
