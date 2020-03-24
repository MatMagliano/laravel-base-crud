@extends('layouts.layout')

@section('header')
    <h2>All Comics</h2>
@endsection

@section('main')
<div class="comics">
  @foreach ($comics as $comic)
    <div class="comic">
      <ul>
      <li>{{$comic->title}}</li>
      <li>{{$comic->number}}</li>
      <li>{{$comic->page}}</li>
      <li>{{$comic->publishing}}</li>
      <li>{{$comic->price}}</li>
      <li>
        <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit">DELETE</button>
        </form>
      </li>
    </ul>
    </div>
  @endforeach
</div>
@endsection
@section('footer')
    
@endsection