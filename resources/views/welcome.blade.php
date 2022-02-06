@extends('layouts.default')

@section('content')
      <div class="container-fluid mt-4">
        <div class="row">
    @foreach($products_arr as $product)
      <div class="col-md-3 mb-5">
        <img class="img_product_item" src={{$product -> url }} alt="Photo">
        <h3>{{ $product -> title }}</h3>
        <p>Price: {{$product -> price}}$</p>
        <p>Qty: {{$product -> qty}}</p>
        <p>Description: {{$product -> description}}</p>
        @if ($product -> available == '1')
        <button class="btn btn-success">Purchase</button>
        @else
        <button class="btn btn-danger">Not available</button>
        @endif
      </div>
    @endforeach
  </div>
  </div>
@endsection
