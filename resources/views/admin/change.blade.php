@extends('layouts.default')


@section('content')
<div class="container-fluid pt-5">
<h3>ADMIN</h3>
 <p>Data settings</p>
 @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
 @endif

 <div style="border: 1px solid grey" class="col-md-4 p-2">
 <form  action="/admin/create-change/{{$response->id}}" method="post">
    @csrf
    <p class="mt-3">Name</p>
    <input type="text" name="name" value='{{$response->title}}' placeholder="Type name...">
    <p class="mt-3">Description</p>
    <textarea name="description"  rows="8" cols="59" placeholder="Type description...">
      {{$response->description}}
    </textarea>
    <p class="mt-3">Price</p>
    <input type="text" name="price" value='{{$response->price}}' placeholder="Type price...">
    <p class="mt-3">Url</p>
    <input type="text" name="url" value='{{$response->url}}' placeholder="Type url...">
    <p class="mt-3">Qty</p>
    <input type="text" name="qty"  value='{{$response->qty}}' placeholder="Type qty...">
    <p class="mt-3">Availability</p>
    <input type="text" name="available" value='{{$response->available}}' placeholder="Type availability...">
    <br>
    <button class="mt-3" type="submit">Send change</button>
 </form>
</div>
</div>
 @endsection
