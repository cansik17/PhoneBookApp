@extends('layouts.master')
@section('content')
    
  <div class="container">

    <h3>Lorem ipsum dolor sit amet.</h3><br>
<div>
    <a href="{{route('phonebook.index')}}" class="btn btn-primary float-right ">Back</a>
</div>  <br><br>

      <form action="{{route('phonebook.store')}}" method="POST">
        @csrf
        

        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>
          <input type="text" name="name" value="{{old('name')}}" class="form-control" id="formGroupExampleInput" placeholder="name">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Phone Number</label>
          <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="formGroupExampleInput2" placeholder="phone number">
        </div>
        <button type="submit" class="btn btn-primary">Create New Contact</button>
    </form>
  </div>
@endsection