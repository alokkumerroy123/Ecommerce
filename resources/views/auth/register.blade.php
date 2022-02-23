@extends('layouts.frontend')
@section('main')
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 mt-5">
					<h1 class="text-center md-3">Regestration</h1>
					<form action="{{route('register')}}" method="post">
						@csrf
						  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name" value="{{old('name')}}">
     @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  			  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror" id="phone"  placeholder="Enter your phone number" value="{{old('phone')}}">
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
   			  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea name="address" id="address" class="form-control  @error('address') is-invalid @enderror" placeholder="Enter your address">{{old('address')}}</textarea>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter your email" value="{{old('email')}}">
      @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control @error('Password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter your password">
     @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

    <div class="mb-3">
    <label for="c_password" class="form-label">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="c_password" placeholder="Confirm password" >
     @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
					
				</div>
				
			</div>
		</div>

	
	@endsection