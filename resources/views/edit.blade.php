@extends('layouts.master')
@section('content')
    
  <div class="container">

    <h3>Lorem ipsum dolor sit amet.</h3><br>
      <div>
          <a href="{{route('phonebook.show', $rows->id)}}" class="btn btn-primary float-right ">Back</a>
      </div>  <br><br>

      <form action="{{route('phonebook.update', $rows->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>
          <input type="text" name="name" value="{{$rows->name}}" class="form-control" id="formGroupExampleInput" placeholder="name">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Phone Number</label>
          <input type="text" name="phone" value="{{$rows->phone}}" class="form-control" id="formGroupExampleInput2" placeholder="phone number">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection