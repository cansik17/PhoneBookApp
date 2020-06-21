@extends('layouts.master')
@section('content')
    
<div class="container">
  <br>
<h3>You can add, edit , delete and search your all contacts with this <strong>PhoneBookApp</strong> enjoy it! .</h3><br>


<input id="search" name="search" class="form-control" type="text" placeholder="Search" aria-label="Search"><br>

<a href="{{route('phonebook.create')}}" class="btn btn-primary float-right">Add New Phone Number</a><br><br>
<table class="table table-striped">
   <br><h3 align="center">Total Records : <span id="total_records"></span></h3><br>
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      
    </tr>
  </thead>
  <tbody>
   

             
  </tbody>
</table>
</div>
{{-- {{ $rows->links() }} --}}
@endsection

@section('search')
<script>
  $(document).ready(function(){

  fetch_customer_data();

  function fetch_customer_data(query = '')
  {
    $.ajax({
    url:"{{ route('phonebook.search') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
      $('tbody').html(data.table_data);
      $('#total_records').text(data.total_data);
    }
    })
  }

  $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_customer_data(query);
  });
  });
</script>
@endsection