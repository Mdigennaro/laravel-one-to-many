@extends('layouts.admin')

@section('content')

<div class="container">
  <div class="row">
    <h1 class="pr-5">Posts</h1>

    
    @if (session('deleted'))
    <div class="alert alert-success text-center w-25" role="alert">
      {{session('deleted')}}
    </div>
    @endif

    <table class="table border">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titolo</th>
          <th scope="col">Contenuto</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>
              <a href="{{route('admin.posts.show', $post)}}" class="btn btn-primary">Apri</a>
            </td>
            <td>
              <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning">Modifica</a>
            </td>
            <td>
              <form onsubmit="return confirm('Vuoi eliminare {{$post->title}} per sempre ?')" action="{{route('admin.posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Elimina</button>

              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@endsection

@section('title')
 lista post
@endsection