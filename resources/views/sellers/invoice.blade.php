@extends('layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#{{$data['orderID']}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('sellerShow',['id'=>$data['seller_id']])}}">Order</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to print.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{env('APP_NAME')}}
            <small class="pull-right">Order Date: {{date('d, M Y',strtotime($data['created_at']))}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>{{env('APP_NAME')}}</strong><br>
            {{env('ADDRESS')}}<br>
            {{env('ADDRESS_STATE')}}, {{env('ADDRESS_PIN')}}<br>
            Phone: {{env('ADDRESS_PHONE')}}<br>
            Email: {{env('ADDRESS_EMAIL')}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{$data['delivery_address']['full_name']}}</strong><br>
            {{$data['delivery_address']['address_1']}},{{$data['delivery_address']['address_2']}}<br>
            {{$data['delivery_address']['landmarks']}}<br>
            Phone: {{$data['delivery_address']['mobile']}}<br>
            Email: {{$data['user']['email']}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #000000{{$data['id']}}</b><br>
          <br>
          <b>Order ID:</b> {{$data['orderID']}}<br>
          <b>Payment Due:</b> {{date('d, M Y',strtotime($data['created_at']))}}<br>
          <b>Payment Status:</b> {{$data['payment_status']}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>SN</th>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php $count=1; foreach($data['order_detail'] as $item){ ?>
            <tr>
              <td>{{$count}}</td>
              <td>{{ucwords($item['product_name'])}}</td>
              <td>{{$item['quantity']}}</td>
              <td>₹{{number_format($item['unit_price'],2)}}</td>
              <td>₹{{number_format($item['total_amount'],2)}}</td>
            </tr>
          <?php $count++; $total[]=$item['total_amount']; $totalShipping[]='0.00';} ?>
           
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Method: {{$data['payment_mode']['payment_name']}}</p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Note: All Cash on Delivery payment mode only cash or you can make the payment 
            by any wallet which are acceptable by seller, Please confirm before doing
            any kind of payment from seller.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Payment Due {{date('d, M Y',strtotime($data['created_at']))}}</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>₹{{number_format($data['totalAmount'],2)}}</td>
              </tr>
              <tr>
                <th>Tax (3.0%)</th>
                <td><?php $tax= ($data['totalAmount']*env('TAX'))/100?>₹{{number_format($tax,2)}}</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>₹00.00</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>₹{{number_format($data['totalAmount'],2)}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
@endsection