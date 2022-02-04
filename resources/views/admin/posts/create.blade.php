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
    
    <div class=" mb-4">
      <label for="category_id">Categoria</label>
      <select name="category_id" id="category_id" class="form-control w-25" aria-label="Default select example">
        <option selected>Categoria</option>
        @foreach ($categories as $category)
          
        <option value="{{$category->id}}">{{$category->name}}</option>
        
        @endforeach
      </select>
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