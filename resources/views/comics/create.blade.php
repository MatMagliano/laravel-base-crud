<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="{{route('comics.store')}}" method="post">
  @csrf
  <input type="title" name='title' placeholder="title">
  <input type="number" name='number' placeholder="number">
  <input type="page" name='page' placeholder="page">
  <input type="publishing" name='publishing' placeholder="publishing">
  <input type="price" name='price' placeholder="price">
  <button type="submit">Salva</button>






  @method('POST')  
  
  
  
  
  </form>
</body>
</html>