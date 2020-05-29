@extends('layouts.list')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        State List
        <small>List of state of your Marketplace</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('statelist')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All State</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>State Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php $count=1;?>
              
                @foreach($location->items() as $locationObj)
                <tr>
                  <td>{{$count}}</td>
                  <td>{{$locationObj->state}}</td>
                  <td><?php if($locationObj->status==1){ ?> <button type="button" class="btn bg-olive">Active</button><?php }else{ ?>
                  	<button type="button" class="btn bg-red">Inactive</button>
                  	<?php }?></td>
                  <td align="center">
                  	<a href="{{route('distict',[str_replace(' ','_',$locationObj->state)])}}" title="All Distict List"><i class="fa fa-list" ></i></a>
                  	&nbsp;&nbsp;
                  	<a href="#"><i class="fa fa-close"></i></a>
                  	</td>
                </tr>
                <?php $count++; ?>
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