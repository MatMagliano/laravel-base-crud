@extends('layouts.layout')
@section('header')
    <h2>Comic</h2>
@endsection

@section('main')
<div class="comics">
  
    <div class="comic">
      <ul>
      <li>{{$comic->title}}</li>
      <li>{{$comic->number}}</li>
      <li>{{$comic->page}}</li>
      <li>{{$comic->publishing}}</li>
      <li>{{$comic->price}}</li>
    </ul>
    </div>
</div>
@endsection
@section('footer')