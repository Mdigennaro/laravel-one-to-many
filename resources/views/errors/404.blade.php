@extends('layouts.admin')

@section('content')
    <div class="container text-center">
      <h1>Errore 404</h1>
      <h2>Post non trovato</h2>
      <p>{{$exception->getMessage()}}</p>
    </div>
@endsection

@section('title')
 404
@endsection