@extends('layouts.dashboard')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Order List
        <small>All Order List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
              <h3 class="box-title">Search Filter</h3>
              <div class="box-body">
              <div class="row">
                <form action="{{route('allOrder')}}" method="POST">
                  {{csrf_field()}}
                <div class="col-xs-2">
                  <input type="text" class="form-control" placeholder="OrderID" name="orderId" value="{{$orderId}}">
                </div>
               <div class="col-xs-3">
                <select name="seller_id" class="form-control">
                  <option value="">Choose Seller</option>
                  <?php foreach($sellerList as $seller){ ?>
                    <option value="{{$seller['id']}}" <?php if($seller_id==$seller['id']){ ?> selected='selected' <?php } ?>>{{$seller['business_name']}}</option>
                  <?php } ?>
                </select>
                </div>
                <div class="col-xs-2">
                  <select name="order_status" class="form-control">
                    <option value="">Order Status</option>
                    <option value="Processing" <?php if($seller_id=='Processing'){ ?> selected='selected' <?php } ?>>Processing</option>
                    <option value="Open" <?php if($seller_id=='Open'){ ?> selected='selected' <?php } ?>>Open</option>
                    <option value="Complete" <?php if($seller_id=='Complete'){ ?> selected='selected' <?php } ?>>Complete</option>
                    <option value="Closed" <?php if($seller_id=='Closed'){ ?> selected='selected' <?php } ?>>Closed</option>
                    <option value="Canceled" <?php if($seller_id=='Canceled'){ ?> selected='selected' <?php } ?>>Canceled</option>
                  </select>
                </div>
                <!-- <div class="col-xs-2">
                  <input type="text" class="form-control" placeholder="selelrId">
                </div> -->
                <div class="col-xs-3">
                  <select name="payment_status" class="form-control">
                    <option value="">Choose Payment Status</option>
                    <option value="Pending" 
                    <?php if($payment_status=='Pending'){ ?> selected='selected' <?php } ?> >Pending</option>
                    <option value="Processing" <?php if($payment_status=='Processing'){ ?> selected='selected' <?php } ?> >Processing</option>
                    <option value="Success" <?php if($payment_status=='Success'){ ?> selected='selected' <?php } ?>>Success</option>
                    <option value="Canceled" <?php if($payment_status=='Canceled'){ ?> selected='selected' <?php } ?>>Canceled</option>
                    <option value="Payment Review" <?php if($payment_status=='Payment Review'){ ?> selected='selected' <?php } ?>>Payment Review</option>
                    <option value="On Hold" <?php if($payment_status=='On Hold'){ ?> selected='selected' <?php } ?>>On Hold</option>
                    <option value="Complete" <?php if($payment_status=='Complete'){ ?> selected='selected' <?php } ?>>Complete</option>
                  </select>
                </div>
                <div class="col-xs-2">
                  <input type="submit" class="btn btn-success" value="Search" name="submit">
                  <input type="reset" class="btn btn-danger" value="Clear" name="Clear">
                </div>
                </form>
               
              </div>
            </div>
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
                    <th>Seller</th>
                    <th>Seller Phone</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Payment Mode</th>
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
                    <td><a href="javascript:void(0)">{{$orderItem['Seller']['business_name']}}</a></td>
                    <td><a href="javascript:void(0)">{{$orderItem['Seller']['contact_number']}}</a></td>
                    <td>₹ {{number_format($orderItem['totalAmount'],2)}}</a></td>
                    <td><?php if($orderItem['payment_status']=='Success'){ ?>
                          <span class="label label-success">Success</span>
                     <?php }else{ ?>
                      <span class="label label-danger">{{$orderItem['payment_status']}}</span>
                      
                     <?php } ?>
                    </td>
                    <td><span class="label label-info">{{(!empty($orderItem['PaymentMode']))?$orderItem['PaymentMode']['payment_name']:'Cash On Delivery'}}</span></td>
                    <td>{{date('d, M Y  h:i A',strtotime($orderItem['created_at']))}}</a></td>
                    <td><a href="{{route('orderInvoice',['orderId'=>$orderItem['orderID']])}}">Invoice</a></a></td>
                    <td>
                      <a href="#"><i class="fa fa-pencil" title="Edit Order"></i></a>&nbsp;|&nbsp;
                      <a href="{{route('orderInvoice',['orderId'=>$orderItem['orderID']])}}"><i class="fa fa-laptop" title="View Order"></i></a>&nbsp;|&nbsp;
                      <a href="#"><i class="fa fa-times" title="Delete Order"></i></a>
                    </td>
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
