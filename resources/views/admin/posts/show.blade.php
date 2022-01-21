@extends('layouts.admin')

@section('title', 'Scrivi il tuo post...')

@section('content')

  <div class="container">
        

        <div class="form-group">
          <label class="form-label">Titolo</label>
          <h1>{{ $post->title }}</h1>
          
        </div>

        <div class="form-group">
          <label class="form-label">Categoria</label>
          <h3>{{ $post->category->name }}</h3>
          
        </div>


        <div class="form-group">
         <p> {{ $post->body }} </p>
        </div>


        <div class="form-group">
         <img style="height: 250px" src={{ $post->coverImg}} alt="">
        </div>
      

        <div class="d-flex">

          <a href="{{route('admin.posts.edit', $post->id)}}"
            class="btn btn-outline-info mr-3" >Modifica</a>

            <a href="{{route('admin.posts.index')}}"
            class="btn btn-outline-info mr-3" >Tutti i Post</a>
         
        </div>
          
        </div>

    
  </div>

@endsection