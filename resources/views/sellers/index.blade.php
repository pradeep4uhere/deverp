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


<table class="table table-strip">
 <tr>
   <th>ID</th>
   <th>User</th>
   <th>Name</th>
   <th>Phone</th>
   <th>Email</th>
   <th>Address</th>
   <th>Pincode</th>
   <th>Status</th>
   <th>Created</th>
   <th>Action</th>
 </tr>
 @foreach ($dataList as $key => $listItem)
  <tr>
    <td>{{ $listItem->id }}</td>
    <td>{{ $listItem->user_id }}</td>
    
    <td><a href="{{ route('sellerShow',$listItem->id) }}">{{ $listItem->business_name }}</a></td>
    <td><i class="fa fa-circle text-success"></i>&nbsp;{{ $listItem->contact_number }}&nbsp;</td>
    <td>{{ $listItem->email_address }}</td>
    <td>{{ $listItem->address_1 }},{{ $listItem->location }}</td>
    <td>{{ $listItem->pincode }}</td>
    <td><a href="{{route('updatesellerstatus',['seller_id'=>$listItem->id,'status'=>$listItem->status])}}">
        <?php if($listItem->status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></a></td>
    <td>{{ date('d M, Y',strtotime($listItem->created_at)) }}</td>
    <td>
       <a class="" href="{{ route('sellerShow',$listItem->id) }}">Show</a>&nbsp;|&nbsp;
       <a class="" href="{{ route('sellerEdit',$listItem->id) }}">Edit</a>
    </td>
  </tr>
 @endforeach
</table>


{{ $dataList->onEachSide(5)->links() }}

</div>
@endsection