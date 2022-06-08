@extends('layouts.frontend')
@section('main')
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light ">Ecommerce</h1>
        <p class="lead text-muted"></p>
        <p>
          <a href="{{route('show.cart')}}" class="btn btn-primary my-2">Show Cart</a>
          
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      	@foreach($products as $product)
        <div class="col">
          <div class="card shadow-sm">
          <img src="{{asset('uploads/products/'.$product->photo)}}" height="150" width="200px">

            <div class="card-body">
              <h3>Name:{{$product->name}}</h3>
              <p class="card-text">{{$product->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
              
                  <a href="{{route('add.cart',$product->id)}}" class="btn btn-success">Add to cart</a>
                </div>
                <small class="btn btn-warning">Price:{{$product->price}}<strong>৳</strong></small>
              </div>
            </div>
          </div>
      </div>
          @endforeach
          {{$products->links()}}

       
        </div>
      </div>
  </div>
@endsection