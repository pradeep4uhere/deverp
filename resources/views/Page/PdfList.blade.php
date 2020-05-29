@extends('layouts.dashboard')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Pdf List
        <small>All Pdf List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('uploadpdf') }}"> Upload PDF File</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      @if (Session::has('message'))
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
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
                <table class="table no-margin" style="font-size: 12px;">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Pdf Title</th>
                    <th class="pull-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($pageList->count()){
                  foreach($pageList as $pageListItem){ ?>
                  <tr>
                   <td>{{$pageListItem['id']}}</td>
                   <td>
                        <?php if($pageListItem['type']==1){ echo 'Terms and Conditions'; }?>
                        <?php if($pageListItem['type']==2){ echo 'Privacy and Policy'; }?>
                   </td>
                    <td class="pull-right">
                      <a href="{{route('deletepdf',['id'=>$pageListItem['id']])}}" title="Delete"><i class="fa fa-trash"></i>&nbsp;</a>
                    </td>
                  </tr>
                <?php }} ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
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
