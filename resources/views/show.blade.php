@extends('layouts.master')
@section('content')
    
<div class="container m-5">
      
      <div class="card" style="width: 18rem;">
        <a href="{{route('phonebook.index')}}" class="btn btn-outline-primary mb-3 "> Back To The All Contacts</a> 
        <div class="card-body">
          <h5 class="card-title">{{$rows->name}}</h5>
          <p class="card-text"><b>{{$rows->phone}}</b></p>
          <a href="{{route('phonebook.edit', $rows->id)}}" class="badge badge-primary">Edit</a>
          <form class="d-inline" action="{{route('phonebook.destroy', $rows->id)}}" method="post">
                       
              @csrf
              @method('delete')
              
            <button  type="submit" style="cursor: pointer;" class="badge badge-danger">Delete</button>
          
          </form>
        </div>
      </div>  
  
  </div>
@endsection