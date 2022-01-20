@extends('layouts.admin')

@section('title', 'Elenco Posts')

@section('content')

<div class="container">

        <ul class="nav justify-content-center mb-4">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" 
                href="{{route('admin.posts.create')}}"> 
                    <span style="color:blue; font-weight:bolder;">
                        Crea il tuo Post</span>
                </a>
            </li>

        </ul>

        <div class="card">
        <div class="card-header">{{ __('Post Creati') }}</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
            {{ session('status') }}
            </div>
            @endif

            @if(count($postList) === 0)
            Non sono presenti Post , creane uno :) 
            @else
            <ul class="list-group">
            @foreach($postList as $post)
            <li
                class="list-group-item d-flex align-items-center justify-content-between">
                <ul>
                    <li><h2>Titolo:</h2><br>{{$post->title}}</li>
                    <li><h3>Contenuto</h3><br>{{$post->body}}</li>
                    <li><img src="{{$post->coverImg}}" alt="{{$post->title}}"></li>
                </ul>
                

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