@extends('layouts.admin')

@section('content')
  <div class="pt-5 container">

    <div class="mdg-post text-center pb-5">

      <h1 class="pb-5">{{$post->title}}</h1>
  
      <p>{{$post->content}}</p>

    </div>  
    <div class="btn-action">

      <a href="{{route('admin.posts.index')}}" class="btn btn-info mr-2">Torna alla lista</a>
      <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning">Modifica</a>
      
    </div>

  </div>
@endsection

@section('title')
 post
@endsection