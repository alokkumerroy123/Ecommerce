@extends('layouts.backend')
@section('main')
<div class="row mt-3">
  <h2 class="text-center">Edit Product</h2>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form action="{{route('admin.product.edit',$product->id)}}" method="post" enctype="multipart/form-data">
      @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$product->name}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
    <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{$product->price}}">
     @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
   <div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{$product->discount}}">
     @error('discount')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
   <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{$product->description}}</textarea>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="mb-3">
    <label for="photo" class="form-label">Photo</label>
     <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
     <img src="{{asset('uploads/products/'.$product->photo)}}" width="50px" class="m-3">
   
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
	
</div>

@endsection