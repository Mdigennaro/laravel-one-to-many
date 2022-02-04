@extends('layouts.admin')

@section('content')
<div class="container">

  <h1 class="text-center pb-4">Crea post</h1>

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

  <form action="{{route('admin.posts.store')}}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control 
      @error('title')
        is-invalid
      @enderror" 
      id="title" name="title" placeholder="Come lo chiami il post?"
      value="{{old('title')}}">
    </div>
    <div class="mb-4">
      <label for="content" class="form-label">Post</label>
      <textarea class="form-control @error('content')
        is-invalid
      @enderror" 
      id="content" name="content" rows="3" placeholder="Scrivi qui il tuo post ...">{{old('content')}}
      </textarea>
    </div>
  
    <div class="btn-action">
      <button type="submit" class="btn btn-success mr-2">Crea</button>
      <button href="#" type="reset" class="btn btn-secondary">Reset</button>
    </div>

  </form>

</div>
@endsection

@section('title')
 crea post
@endsection