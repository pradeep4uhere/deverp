@extends('layouts.addpage')
@section('content')

<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Location in {{$state_name}} 
        <small>Add New Location</small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('statelist') }}">All Location</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <!-- right column -->
        <div class="col-md-10">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter Menu Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('savelocation')}}" method="post" >
              {{csrf_field()}}
              <div class="box-body">
                 <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">State</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" placeholder="Enter Location Name" name="state" readonly="readonly" value="{{$state_name}}">
                  
                </div>
              </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">District</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="district">
                      <option value="0">Choose District </option>
                      <?php foreach($district as $item){ ?>
                      <option value="{{$item['district']}}">{{$item['district']}}</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Enter New Location</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" placeholder="Enter Location Name" name="title">
                  
                </div>
              </div>

               <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Pincode</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="Pincode" placeholder="Enter Pincode" name="pincode">
                </div>
              </div>
                
               
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Location Status</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          <!-- /.box -->
         
        </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
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
<script type="text/javascript">
  
function getAjaxCall(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"{{env('APP_URL')}}/public/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
    });
};
</script>
@endsection
