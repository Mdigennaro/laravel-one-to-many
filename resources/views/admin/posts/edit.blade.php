@extends('layouts.admin')

@section('content')
<div class="container">

  <h1 class="text-center pb-4">Modifica post</h1>

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <nav>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </nav>
    </div>
  @endif

  <form action="{{route('admin.posts.update', $post)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control 
      @error('title')
        is-invalid
      @enderror" 
      id="title" name="title" placeholder="Come lo chiami il post?"
      value="{{old('title', $post->title)}}">
    </div>
    <div class="mb-4">
      <label for="content" class="form-label">Post</label>
      <textarea class="form-control @error('content')
        is-invalid
      @enderror" 
      id="content" name="content" rows="3" placeholder="Scrivi qui il tuo post ...">{{old('content', $post->content)}}
      </textarea>
    </div>
  
    <div class="btn-action">
      <button type="submit" class="btn btn-success mr-2">Aggiorna</button>
      <a href="{{route('admin.posts.index')}}" class="btn btn-info mr-2">Torna alla lista</a>
    </div>

  </form>

</div>
@endsection

@section('title')
 modifica post
@endsection