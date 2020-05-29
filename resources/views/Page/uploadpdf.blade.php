@extends('layouts.addpage')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Pdf 
        <small>Add New Pdf</small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('pdflist') }}">All Pdf List</a></li>
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
              <h3 class="box-title">Enter PDF Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('saveuploadpdf')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">PDF Type</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="pdftype">
                      <option value="0">Choose PDF Type</option>
                      <?php foreach($pdfType as $item=>$val){ ?>
                      <option value="{{$item}}">{{$val}}</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Choose Pdf</label>
                    <div class="col-sm-8">
                        <input  type="file" class="form-control1" id="upload_file"  name="upload_file">
                    </div>
                </div>
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
  <div class="control-sidebar-bg"></div>
@endsection
