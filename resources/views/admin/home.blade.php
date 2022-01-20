@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  {{-- Qui è presente la Dashboard --}}      
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1><span style="font-weight: bolder">{{ Auth::user()->name }}</span> -  Sei in Admin.home </h1>

                    
                    
                    {{ __('Sei loggato') }}
{{-- l'if che segue mi dice che sei loggato come admin mi permette di vedere il tasto lista utenti 
Quindi vale solo per admin--}}
                    @if(Route::has("admin.users.index") && Auth::user()->role === "admin")
                    <li style="list-style: none;" class="nav-item active">
                        <a class="nav-link" href="{{route('admin.users.index')}}">
                        
                        <span style="color:blue; font-weight:bolder;">
                            Lista Utenti</span>
                        </a>
                    
                    </li>
                    @endif
{{-- Fa due controlli un primo vede se esistono post nel caso fa apparire il tasto che porta alla pagina --}}
                    @if(Route::has("admin.posts.index") )
                    <li style="list-style: none;" class="nav-item active">
                        <a class="nav-link" href="{{route('admin.posts.index')}}">
  {{-- Se l'utente è un admin li mostra tutti nel caso contrario solo quelli dell'utente user --}}                      
                            @if (Auth::user()->role === "admin")

                            <span style="color:blue; font-weight:bolder;">
                                Mostra tutti i Post</span>
                                
                            @else
                            <span style="color:blue; font-weight:bolder;">
                                Mostra i Post dell'utente :   <span style="font-size:20px">{{ Auth::user()->name }}</span></span>
                        
                            
                        @endif
                       


                        </a>
                    
                    </li>
                    @endif


                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
