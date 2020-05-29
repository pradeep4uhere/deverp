@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manage Seller</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Seller</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $listItem)
  <tr>
    <td>{{ $listItem->id }}</td>
    <td>{{ $listItem->business_name }}</td>
    <td>{{ $listItem->email }}</td>
    <td>
   
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('sellers.show',$listItem->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('sellers.edit',$listItem->id) }}">Edit</a>

 
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

</div>
@endsection