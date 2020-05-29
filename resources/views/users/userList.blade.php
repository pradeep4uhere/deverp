@extends('layouts.list')
@section('content')
<style type="text/css">
  .content  table{
    font-family: sans-serif; 
    font-size: 12px;
  }
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer List
        <small>List of all customers registred on Marketplace</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">All List Of Customer</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>pincode</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userList->items() as $itemObj)

                <tr>
                  <td>{{$itemObj['id']}}</td>
                  <td>{{$itemObj['first_name']}}&nbsp;{{$itemObj['last_name']}}</td>
                  <td>{{$itemObj['gender']}}</td>
                  <td>{{$itemObj['email']}}</td>
                  <td>{{$itemObj['mobile']}}</td>
                  <td>{{$itemObj['address_1']}}<br/>{{$itemObj['address_2']}},{{$itemObj['address_3']}}</td>
                  <td>{{$itemObj['pincode']}}</td>
                  <td><?php if($itemObj['status']==1){ ?> 
                    <span class="label label-success">>Active</span><?php }else{ ?>
                  	<span class="label label-danger">Inactive</span>
                  	<?php }?></td>
                  <td align="center">
                  	<a href="#" data-toggle="modal" data-target="#modal-default" data-id="{{$itemObj['id']}}" onClick="$('#hiddenText').val({{$itemObj['id']}})"><i class="fa fa-edit" ></i></a>
                  	&nbsp;&nbsp;
                  	<a href="#"><i class="fa fa-close"></i></a>
                  	</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
              <div class="box-footer clearfix pull-right">{{$userList->links()}}</div>
              
            </div>

            <!-- /.box-body -->
          </div>

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
   	  <input type="hidden" id="hiddenText">
      <div class="modal-body">
        <!--Dynamic Content Goes Here-->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection