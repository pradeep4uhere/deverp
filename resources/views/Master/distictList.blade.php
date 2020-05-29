@extends('layouts.list')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distict List
        <a href="{{route('distictlocation',[str_replace(' ','_',$state_name)])}}">
          <small><i class="fa fa-plus"></i>&nbsp;Add New Location Into {{$state_name}}</small>
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="{{route('statelist')}}">Location</a></li>
        <li><a href="{{route('distict',[str_replace(' ','_',$state_name)])}}">{{$state_name}}</a></li>
        <li class="active">All Distict</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       @if (Session::has('message'))
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Location Name</th>
                  <th>District</th>
                  <th>Pincode</th>
                  <th>State Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($location->items() as $locationObj)

                <tr>
                  <td>{{$locationObj['id']}}</td>
                  <td>{{$locationObj['location']}}</td>
                  <td>{{$locationObj['district']}}</td>
                  <td>{{$locationObj['pincode']}}</td>
                  <td>{{$locationObj['state']}}</td>
                  <td><?php if($locationObj['status']==1){ ?> <button type="button" class="btn bg-olive">Active</button><?php }else{ ?>
                  	<button type="button" class="btn bg-red">Inactive</button>
                  	<?php }?></td>
                  <td align="center">
                  	<a href="{{route('editlocation',[$locationObj['id']])}}"><i class="fa fa-edit" ></i></a>
                  	&nbsp;&nbsp;
                  	<a href="#"><i class="fa fa-close"></i></a>
                  	</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
              <div class="box-footer clearfix">{{$location->links()}}</div>
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