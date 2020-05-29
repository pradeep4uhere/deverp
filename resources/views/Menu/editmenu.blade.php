@extends('layouts.addpage')
@section('content')

<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Menu 
        <small>Add New Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('allmenu') }}">All Menu List</a></li>
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
            <form class="form-horizontal" action="{{route('editmenu',['id'=>$menu['id']])}}" method="post" >
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$menu['id']}}">
              <div class="box-body">
              <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Enter New Menu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" placeholder="Enter menu title" name="title" value="{{$menu['title']}}">
                </div>
              </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Parent</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="menu">
                      <option value="0" <?php if($menu['parent_id']==0){?> selected="selected" <?php } ?>>Choose Parent Menu</option>
                      <?php foreach($menuList as $item){ ?>
                        <option value="{{$item['id']}}" 
                        <?php if($menu['parent_id']==$item['id']){ ?> selected="selected" <?php } ?>>
                          {{$item['title']}}
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Page Status</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="status">
                      <option value="1" <?php if($menu['status']==1){ ?> selected="selected" <?php } ?>>Active</option>
                      <option value="0" <?php if($menu['status']==0){ ?> selected="selected" <?php } ?>>InActive</option>
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
