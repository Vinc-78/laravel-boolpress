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
            Non sono presenti Post per: <span style="font-size:20px; color:blue;">
                {{ Auth::user()->name }}</span>, creane uno :) 
            @else

            <ul class="list-group">
            @foreach($postList as $post)
            <li
                class="list-group-item d-flex align-items-center justify-content-between">
                <ul class="post-view">
                    <li><h2>Titolo:</h2>{{$post->title}}</li>
                    <li><h3>Contenuto</h3>{{$post->body}}</li>
                    <li><img style="height:200px;" src="{{$post->coverImg}}" alt="{{$post->title}}"></li>
                </ul>
                
                <div class="d-flex">
                    <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-outline-info mr-3">
                        Visualizza
                        </a>

                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-outline-info mr-3">
                        Modifica
                        </a>

                </div>
                
            </li>
            @endforeach
            </ul>
            @endif

        </div>
        
</div>
@endsection