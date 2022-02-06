@extends('layouts.default')

@section('content')
<div class="container-fluid pt-5">
<h3>ADMIN</h3>
<form action="/admin/update" method="post">
  @csrf
  <button type="submit">Update Data</button>
</form>

<table cellspacing="0" cellpadding="0" class="mt-5">
  <thead>
    <tr>
      <td>id</td>
      <td>name</td>
      <td>description</td>
      <td>price</td>
      <td>img</td>
      <td>qty</td>
      <td>availability</td>
      <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach($response as $item)
    <tr>
      <td>{{$item -> id}}</td>
      <td>{{$item -> title}}</td>
      <td>{{$item -> description}}</td>
      <td>{{$item -> price}}</td>
      <td>{{$item -> url}}</td>
      <td>{{$item -> qty}}</td>
      <td>{{$item -> available}}</td>
      <td><button><a href={{route('admin.change',[
        'id' => $item -> id
        ])}}>Перейти к настройкам</a></button></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
