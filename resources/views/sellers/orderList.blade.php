@extends('layouts.dashboard')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$data['business_name']}}
        <small>All Order List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('sellerShow',['id'=>$data['id']])}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Order List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          
        </div>
       
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">All Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Order Date</th>
                    <th>Invoice</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($orderList->total()>0){
                  foreach($orderList as $orderItem){ ?>
                  <tr>
                    <td><a href="{{route('orderInvoice',['orderId'=>$orderItem['orderID']])}}">{{$orderItem['orderID']}}</a></td>
                    <td><a href="javascript:void(0)">{{$orderItem['User']['first_name']}}&nbsp;{{$orderItem['User']['last_name']}}</a></td>
                    <td><a href="javascript:void(0)">{{$orderItem['User']['mobile']}}</a></td>
                    <td><a href="javascript:void(0)">{{$orderItem['User']['address_1']}}</a></td>
                    <td>₹ {{number_format($orderItem['totalAmount'],2)}}</a></td>
                    <td><?php if($orderItem['payment_status']=='Success'){ ?>
                          <span class="label label-success">Success</span>
                     <?php }else{ ?>
                      <span class="label label-danger">{{$orderItem['payment_status']}}</span>
                     <?php } ?>
                    </td>
                    <td>{{date('d, M Y',strtotime($orderItem['created_at']))}}</a></td>
                    <td><a href="{{route('orderInvoice',['orderId'=>$orderItem['orderID']])}}">Invoice</a></a></td>
                    <td><a href="{{route('orderInvoice',['orderId'=>$orderItem['orderID']])}}">View</a></td>
                  </tr>
                <?php }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
              {{$orderList->links()}}
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
         
          <!-- /.box -->
        </div>
       

        <!-- /.col -->
      </div>

     
      <!-- /.row -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->
@endsection
