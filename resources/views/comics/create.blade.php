@extends('layouts.layout') 

@section('header')
  <h2>Inserisci un fumetto</h2>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @endsection

  @section('main')  
  <form action="{{(!empty($comic)) ? route('comics.update', $comic->id) : route('comics.store')}}" method="post">
  @csrf
  @if(!empty($comic))
    @method('PATCH') 
    @else
    @method('POST') 
  @endif
  <input type="text" name='title' placeholder="title" value="{{(!empty($comic)) ? $comic->title : ''}}">
  <input type="number" name='number' placeholder="number" value="{{(!empty($comic)) ? $comic->number : ''}}">
  <input type="number" name='page' placeholder="page" value="{{(!empty($comic)) ? $comic->page : '' }}">
  <input type="text" name='publishing' placeholder="publishing" value="{{(!empty($comic)) ? $comic->publishing : '' }}">
  <input type="text" name='price' placeholder="price" value="{{(!empty($comic)) ? $comic->price : ''}}">
  @if(!empty($comic))
  <button type="hidden" name="id" value="{{$comic->id}}">Salva</button>
  @endif
  <button type="submit">Salva</button>  
  </form>
  @endsection