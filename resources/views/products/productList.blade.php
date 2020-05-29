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
        All Product List
        <small>List of all product registred on Marketplace</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Products</li>
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
                  <th>Image</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th title="Default Price">DPrice</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th title="Selling Price">SPrice</th>
                  <th title="Return Policy">RP</th>
                  <th>Status</th>
                  <th>Approved</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($itemList->items() as $itemObj)
                <tr>
                  <td>{{$itemObj['id']}}</td>
                  <td>
                    <img src="{{config('backendglobal.PRODUCTS_STORAGE_DIR').DIRECTORY_SEPARATOR.$itemObj['seller_id'].DIRECTORY_SEPARATOR.config('backendglobal.PRODUCT_THUMB_IMG_WIDTH').'X'.config('backendglobal.PRODUCT_THUMB_IMG_HEIGHT').DIRECTORY_SEPARATOR.$itemObj['default_images']}}" height="65" width="65" onerror="this.onerror=null;this.src='{{ Config('backendglobal.THEME_URL_FRONT_IMAGE') }}/default250x250.jpg';"/>
                 
                  </td>
                  <td>{{$itemObj['Product']['title']}}<br/><small>{{$itemObj['Product']['description']}}</small></td>
                  <td>{{$itemObj['Category']['name']}}</td>
                  <td>{{$itemObj['Brand']['name']}}</td>
                  <td align="center">₹{{$itemObj['default_price']}}</td>
                  <td align="center">₹{{$itemObj['price']}}</td>
                  <td align="center">{{($itemObj['discount_value'])?$itemObj['discount_value']:0}}%</td>
                  <td align="center">₹{{$itemObj['selling_price']}}</td>
                 <td>
                 <?php if($itemObj['return_policy']!=''){ ?> 
                    <span class="label label-success">Y</span><?php }else{ ?>
                    <span class="label label-danger">N</span>
                    <?php }?>
                  </td>
                  <td><?php if($itemObj['status']==1){ ?> 
                    <span class="label label-success">Active</span><?php }else{ ?>
                  	<span class="label label-danger">Inactive</span>
                  	<?php }?></td>
                    <td align="center"><?php if($itemObj['status']==1){ ?> 
                    <span class="label label-success">Y</span><?php }else{ ?>
                    <span class="label label-danger">N</span>
                    <?php }?></td>
                  <td align="center">
                  	<a href="#" data-toggle="modal" data-target="#modal-default" data-id="{{$itemObj['id']}}" onClick="$('#hiddenText').val({{$itemObj['id']}})"><i class="fa fa-edit" ></i></a>
                  	&nbsp;&nbsp;<a href="#"><i class="fa fa-close"></i></a>&nbsp;&nbsp;<a href="#"><i class="fa fa-eye"></i></a>
                  	</td>
                </tr>
             
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
              <div class="box-footer clearfix pull-right">{{$itemList->links()}}</div>
              
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