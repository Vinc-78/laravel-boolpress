@extends('layouts.admin')

@section('title', 'Scrivi il tuo post...')

@section('content')

  <div class="container">
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post"
      class="mb-5">
      @csrf
      @method('put')
      

    

        <div class="form-group">
          <label class="form-label">Titolo</label>
          <input id="title" type="text"
            class="form-control @error('title') is-invalid @enderror" name="title"
            value="{{ $post->title }}" required >

          @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
{{-- Inserisco la select che prende le option dalla tabella category --}}
        <div class="form-group">
          <label class="form-label">Categoria</label>
          <select name="category_id" class="form-control ">
            @foreach ($categories as $category)

              <option value="{{$category->id}}"
                @if ($category->id===$post->category_id) selected @endif> {{$category->name}} </option>
                
            @endforeach
             
          </select>

        </div>


        <div class="form-group">
          <label for="body" class="form-label">Contenuto</label>
          <textarea  class="form-control" id="body" name="body" rows="3" value="{{ $post->body }}">
          </textarea >

          @error('body')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>


        <div class="form-group">
          <label class="form-label">Immagine</label>
          <input id="coverImg" type="text"
            class="form-control @error('coverImg') is-invalid @enderror" name="coverImg"
            value="{{ $post->coverImg}}" required >

          @error('coverImg')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      

        <div class="d-flex">

          <a href="{{route('admin.posts.index')}}"
            class="btn btn-outline-secondary mr-3" type="reset">Annulla</a>
          <button class="btn btn-success" type="submit">Salva</button>
        </div>

    </form>

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
  </div>

@endsection