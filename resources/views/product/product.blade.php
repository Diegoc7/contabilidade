@extends('layout.main')

@section('title', 'HDC Events')

@section('content')

<form action="/products/store" method="POST">
@csrf
<label for="title" class="label label-info">  Teste</label>
<input type="text" name="name" id="name">

<input type="submit" value="enviar">
</form>

@endsection