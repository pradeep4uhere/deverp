@extends('layouts.dashboard')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Page List
        <small>All Page List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('createpage') }}"> Create New Page</a></li>
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
                    <th>Page Title</th>
                    <th>Page Slug</th>
                    <th>Page URL</th>
                    <th>Page Status</th>
                    <th class="pull-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($pageList->total()>0){
                  foreach($pageList as $pageListItem){ ?>
                  <tr>
                   <td>{{$pageListItem['id']}}</td>
                   <td>{{$pageListItem['ParentMenu']['title']}}
                   </td>
                   <td>{{$pageListItem['title']}}</td>
                   <td><a href="{{$pageListItem['page_url']}}" target="_blank">{{$pageListItem['page_url']}}</a></td>
                   <td><?php if($pageListItem->status==1){  echo "<font color='green'><b>Active</b></font>"; }else{ echo "<font color='red'><b>Inactive</b></font>";} ?></td>
                    <td class="pull-right">
                      <a href="{{route('editpage',['id'=>$pageListItem['id']])}}">Edit&nbsp;</a>&nbsp;|&nbsp;
                      <a href="{{route('contentlist',['id'=>$pageListItem['id']])}}" title="All Content">Content List&nbsp;</a>|&nbsp;&nbsp;
                      <a href="{{route('deletepage',['id'=>$pageListItem['id']])}}" title="Delete"><i class="fa fa-trash"></i>&nbsp;</a>
                      &nbsp;|&nbsp;
                      <a href="{{route('copypage',['id'=>$pageListItem['id']])}}" title="Make Duplicate Page"><i class="fa fa-file"></i>&nbsp;</a>
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
              {{$pageList->links()}}
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
